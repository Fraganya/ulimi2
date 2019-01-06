<div class="modal fade" id="create-api-user">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New API User</h4>
            </div>
            <div class="modal-body">
                <form action="{{url('api/register')}}" method="POST" id="register-form">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" type="text" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" value="@12345678!" id="password">
                    </div>
                    <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input name="firstname" type="text" class="form-control" value="Test" id="firstname">
                    </div>
                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input name="surname" type="text" class="form-control"  value="User" id="surname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="text" class="form-control"  value="testuer@ulimi.com" id="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input name="number" type="text" class="form-control"  value="0882370345" id="number">
                    </div>
                    <div class="form-group">
                        <label for="specialty">Specialty</label>
                        <input name="specialization" type="text" class="form-control"  value="farming" id="specialization">
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input name="location" type="text" class="form-control"  value="Blantyre" id="location">
                    </div>
                </form>
            </div><!-- ./modal body-->
            <div class="modal-footer">
                <div class="pull-left">
                    <button id="user-registration" class="btn btn-primary">Save User</button>
                    <button onclick="document.getElementById('register-form').submit()" class="btn btn-primary">Page View</button>
                </div>

            </div>
        </div>
    </div>
</div><!-- new user -win-->

<div class="modal fade" id="authenticate-api-user">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New API User</h4>
            </div>
            <div class="modal-body">
                <form action="{{url('api/authenticate')}}" method="POST" id="authenticate-form">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" type="text" class="form-control" id="username-a">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" value="@12345678!" id="password-a">
                    </div>
                </form>
            </div><!-- ./modal body-->
            <div class="modal-footer">
                <div class="pull-left">
                    <button id="user-authentication" class="btn btn-primary">Authenticate User</button>
                    <button onclick="document.getElementById('authenticate-form').submit()" class="btn btn-primary">Page View</button>
                </div>

            </div>
        </div>
    </div>
</div><!-- new user -win-->