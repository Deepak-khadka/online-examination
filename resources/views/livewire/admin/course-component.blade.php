<div>
    <div class="row py-3" style="background: #fafafa;">

        @include('admin.common.message')

        <div class="col-sm-12">
            @if(!$this->updateCourse)
            <form wire:submit.prevent="submit">
                <div class="card border border-danger">
                    <div class="card-header alert-danger">
                        <button type="submit" class="btn btn-primary mt-auto">
                            <i class="fa fa-graduation-cap"></i>
                            Add New Course
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Course Name :</label>
                            <div class="col-sm-6">
                                <input type="text" wire:model="filter.name" class="form-control" value="" name="name"
                                       placeholder="Course Name" autocomplete="off">

                                @error('filter.name')
                                <span class="error">
                                    {{ $message }}
                                </span>
                                @enderror

                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary mt-auto" type="submit" name="submit">Add Course</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @else
                <form wire:submit.prevent="update">
                    <div class="card border border-danger">
                        <div class="card-header alert-danger">
                            <span class="btn btn-primary mt-auto" wire:click.prevent="toggleCourse">
                                <i class="fa fa-graduation-cap"></i>
                                Add Course
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Course Name :</label>
                                <div class="col-sm-6">
                                    <input type="text" wire:model="filter.name" class="form-control" name="name"
                                           placeholder="Course Name" autocomplete="off">

                                    @error('filter.name')
                                    <span class="error">
                                    {{ $message }}
                                </span>
                                    @enderror

                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-primary mt-auto" type="submit" name="submit">Update Course</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </div>

    </div>

    <div class="row pb-5" style="background: #fafafa;">
        <div class="col-sm-12">
            <div class="card border border-danger">
                <div class="card-header alert-danger">
                    <h5><i class="fa fa-graduation-cap"></i> Course Lists</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-stripped">
                        <thead>
                        <th>Course Name</th>
                        <th>Action</th>
                        </thead>
                        <tbody>

                        @foreach($this->courseList as $id => $course)
                            <tr>
                                <td>{{ $course }}</td>
                                <td class="flex" >
                                     <i class="fa fa-pen btn btn-secondary" style="cursor: pointer" title="Edit" wire:click.prevent="edit({{ $id }})"></i> |
                                     <i class="fa fa-trash btn btn-danger" style="cursor: pointer" title="Delete" wire:click.prevent="deleteCourse({{ $id }})"></i>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
