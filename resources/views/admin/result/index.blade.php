@extends('admin.layouts.master')

@section('content')

    <center><strong>Please Select Exam and Enter Student Name To View Result of Student!! </strong></center>

    <div class="row p-5" style="background: #fafafa;">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">

            <form method="post" action="resultshow.php">
                <div class="form-group row">

                </div>

                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Select Exam:</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="exam_name" required="">
                            <option value="">Select exam</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Enter Name of student:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="" name="student_name"
                               placeholder="Enter Name of Student" required="">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 ml-auto">
                        <button class="btn btn-primary" name="submit" type="submit">View</button>
                    </div>

                </div>
            </form>
        </div>
    </div>


    <h4><strong style="color:red;">Sorry!!<br> Please Enter Valid Name.</strong></h4>
    <form action="../admin/result.php" method="post">

        <div class="form-group row">
            <div class="col-sm-3 ml-auto mr-auto">
                <button type="submit" class="form-control btn btn-primary" name="back">Proceed To Back</button>
            </div>
            <table class="table" border="1px solid black">
                <thead>
                <tr>
                    <th>SN</th>
                    <th>COURSE</th>
                    <th>SUBJECTS</th>
                    <th>SCORE</th>
                </tr>
                </thead>

                <tr>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </form>

@endsection
