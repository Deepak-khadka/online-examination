<div>
    <div class="row py-3" style="background: #fafafa;">
        <div class="col-sm-12">

            @include('admin.common.message')

            <form wire:submit.prevent="storeSubject">

                <div class="card border border-danger">
                    <div class="card-header alert-danger">
                        <h5><i class="fa fa-book"></i> Add New Subject</h5>
                    </div>
                    <div class="card-body" >
                        <div class="form-group row">
                           <div class="col-4">
                                   <select class="form-control" name="course" wire:model="filter.course_id">
                                       <option value="">Select Course</option>
                                       @foreach($this->courseList as $id => $course)
                                           <option value="{{ $id }}">{{ $course }}</option>
                                       @endforeach
                                   </select>

                               @error('filter.course_id')
                               <span class="error">
                                    {{ $message }}
                                </span>
                               @enderror

                           </div>

                           <div class="col-4">
                               <div class="">
                                   <input type="text" wire:model="filter.name" class="form-control" value="" name="name" placeholder="Subject Name" autocomplete="off">
                               </div>
                               @error('filter.name')
                               <span class="error">
                                    {{ $message }}
                                </span>
                               @enderror

                           </div>

                            <div class="col-4">
                               <div class="">
                                   <select class="form-control" name="course" wire:model="filter.is_active">
                                       <option value="">Select Status</option>
                                       @foreach(\App\Foundation\Lib\Status::$current as $id => $status)
                                           <option value="{{ $id }}">{{ $status }}</option>
                                       @endforeach
                                   </select>
                               </div>
                               @error('filter.is_active')
                               <span class="error">
                                    {{ $message }}
                                </span>
                               @enderror

                           </div>

                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="">
                                    <textarea name="description" id="description" cols="30" rows="5" wire:model="filter.description" class="form-control"></textarea>
                                </div>
                                @error('filter.description')
                                <span class="error">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-2">
                                <button class="btn btn-primary mt-auto" type="submit" name="submit">Add Subject</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div class="row pb-5" style="background: #fafafa;">
        <div class="col-sm-12">
            <div class="card border border-danger">
                <div class="card-header alert-danger">
                    <h5><i class="fa fa-book"></i> Subject Lists</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-stripped">
                        <thead>
                        <th>Course Name</th>
                        <th>Subject Name</th>
                        <th>Status</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($this->subjectList as $subject)
                            <tr>
                                <td>{{ $subject->course->name }}</td>
                                <td>{{ $subject->name }}</td>
                                <td>{{ \App\Foundation\Lib\Status::$current[$subject->is_active] }}</td>
                                <td class="flex" >
                                    <i class="fa fa-pen btn btn-secondary" style="cursor: pointer" title="Edit" wire:click.prevent="edit({{ $subject->id }})"></i> |
                                    <i class="fa fa-trash btn btn-danger" style="cursor: pointer" title="Delete" wire:click.prevent="delete({{ $subject->id }})"></i>
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
