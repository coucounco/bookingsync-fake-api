@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h3>Hello {{ auth()->user()->name }} !</h3>
                    <hr />
                    <p>You can use these informations to connect to the fake API and fetch fake data.</p>
                    <dl class="row">
                        <dt class="col-sm-3">Endpoint</dt>
                        <dd class="col-sm-9"><code>{{ config('app.url') }}/api/v3/</code></dd>
                        <dt class="col-sm-3">API Token</dt>
                        <dd class="col-sm-9"><code>{{ auth()->user()->api_token }}</code></dd>
                    </dl>
                </div>
            </div> <div class="card">
                <div class="card-body">
                    <h3>Webhooks</h3>
                    <hr />
                    <p>You must provide the webhook <code>endpoint</code> to your app and the <code>secret</code> to be able to send webhooks. Set them in the <code>.env</code>.</p>
                    <dl class="row">
                        <dt class="col-sm-3">Endpoint</dt>
                        <dd class="col-sm-9"><code>{{ config('fakeapi.webhook_url') !== null && !empty(config('fakeapi.webhook_url')) ? config('fakeapi.webhook_url') : '-' }}</code></dd>
                        <dt class="col-sm-3">Secret</dt>
                        <dd class="col-sm-9"><code>{{ config('fakeapi.secret') !== null && !empty(config('fakeapi.secret')) ? config('fakeapi.secret') : '-'  }}</code></dd>
                    </dl>
                    <p>Available events</p>
                    <dl class="row">
                        <dt class="col-sm-3">Rentals</dt>
                        <dd class="col-sm-9">
                            <div class="btn-group" role="group">
                                <a href="#" class="btn btn-secondary btn-sm btn-webhook" data-entity="rental" data-event="rental_created">Created</a>
                                <a href="#" class="btn btn-secondary btn-sm btn-webhook" data-entity="rental" data-event="rental_updated">Updated</a>
                                <a href="#" class="btn btn-secondary btn-sm btn-webhook" data-entity="rental" data-event="rental_destroyed">Destroyed</a>
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>


</div>

<script>
    $(function() {
        let $btnWebhook = $('.btn-webhook');
        let $modalWebhook = $('#webhook-modal');
        let $modalBody = $modalWebhook.find('.modal-body');
        let loading = 'Loading...';

        $btnWebhook.click(function(e) {
            $modalWebhook.modal('show');
            let data = {
                entity: $(this).data('entity'),
                event: $(this).data('event')
            };
            $modalBody.html(loading);
            axios.post(route('webhooks.send'), data)
                .then(function(response) {
                    let content = JSON.stringify(response.data.content);
                    let html = '<strong>Status : </strong><pre>' + response.data.status + '</pre>' +
                        '<strong>Response : </strong><pre>' + content + '</pre>' +
                        '<strong>Payload : </strong><pre>' + response.data.payload + '</pre>';
                    $modalBody.html(html);
                })
                .catch(function(error) {
                    let pre = $('<pre>').text(error.response.data.message);
                    $modalBody.html(pre);
                });
        })
    });
</script>
<div class="modal fade" id="webhook-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Webhook</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
