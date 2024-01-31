@extends('layouts.companylayout')

@section('content')
    

<table class="table text-nowrap">
    <thead>
        <tr>
            <th class="border-top-0">#</th>
            <th class="border-top-0">Name</th>
            <th class="border-top-0">Location</th>
            <th class="border-top-0">E-mail</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Deshmukh</td>
            <td>Prohaska</td>
            <td>www@gmail.com</td>
            <td> <a href=""> Edit</a>
            </td>
            <td>
                <a href="" style="font-color:red;">DELETE</a>
            </td>
        </tr>
    </tbody>
</table>
@endsection