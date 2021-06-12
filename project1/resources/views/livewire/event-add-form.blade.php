<x-app-layout>
    <div>
        <div class="container">
            </div class="row justify-content-center">
                <div class="cold-md-8">
                    <div class="card">
                        <div class="card-header">Add new event</div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="event_name">Event name</label>
                                    <input type="text" name="event_name" id="event_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="contact_name">Contact name</label>
                                    <input type="text" name="contact_name" id="contact_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="contact_email">Contact e-mail</label>
                                    <input type="text" name="contact_email" id="contact_email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="allowed_participants">Allowed participants</label>
                                    <input type="text" name="allowed_participants" id="allowed_participants" class="form-control">
                                    <small>Keep the value to 0 in case it's unlimited</small>
                                </div>
                                <button class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
