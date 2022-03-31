<div class="row py-3" style="background: #fafafa;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-2">
                <div class="card border border-primary">
                    <div class="card-block">
                        <div class="card-header bg-primary text-light">
                            <h5><i class="fa fa-pencil-square-o"></i> Change Password</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="profile.php">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" placeholder="New Password" required="" autocomplete="off" name="new_pass">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Confirm Password" required="" autocomplete="off" name="con_pass">
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit"> Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 ml-auto">
                <div class="card border border-primary">
                    <div class="card-block">
                        <div class="card-header bg-primary text-light">
                            <h5><i class="fa fa-user"></i> Profile</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped" style="font-size: 14px;">
                                <tbody class="text-left">

                                <tr>
                                    <td> Username : </td>
                                    <td> {{ auth()->user()->name }}</td>
                                </tr>
                                <tr>
                                    <td> Email : </td>
                                    <td> {{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <td> Mobile : </td>
                                    <td> {{ auth()->user()->mobile }}</td>
                                </tr>
                                <tr>
                                    <td> Address : </td>
                                    <td> {{ auth()->user()->address }}</td>
                                </tr>
                                <tr>
                                    <td> City : </td>
                                    <td> {{ auth()->user()->city }}</td>
                                </tr>
                                <tr>
                                    <td> Pin : </td>
                                    <td> {{ auth()->user()->pin }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
