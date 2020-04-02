@extends('layouts.admin')

@section('content')

    <h1>Media</h1>
    <hr>

    @if($photos)

        {{ Form::open(['method'=>'DELETE', 'action'=>'AdminMediaController@deleteMedia', 'class'=>'form-inline']) }}

            <div class="form-group">
                <select name="checkBoxArray" id="">
                    <option value="delete">Delete</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary">
            </div>


            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">
                        <input type="checkbox" id="options">
                    </th>
                    <th scope="col">Id</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @if($photos)
                    @foreach($photos as $photo)
                        <tr>
                            <th>
                                <input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="{{$photo->id}}">
                            </th>
                            <th>{{$photo->id}}</th>
                            <td><img height="50" width="50" src="{{$photo->file}}" class="img-thumbnail"></td>
                            <td>{{$photo->file}}</td>
                            <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No date'}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        {{ Form::close() }}

        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">
                {{--            {{$posts->links()}}--}}
                {{$photos->render()}}
            </div>
        </div>

    @endif
@endsection


@section('scripts')

    <script>
        $(document).ready(function () {
            $('#options').click(function () {
                if(this.checked){
                    $('.checkBoxes').each(function () {
                        this.checked = true;
                    });
                }
                else{
                    $('.checkBoxes').each(function () {
                        this.checked = false;
                    });
                }
            });
        });
    </script>

@endsection