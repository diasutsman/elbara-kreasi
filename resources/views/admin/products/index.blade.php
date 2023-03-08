@extends('admin.layouts.main')

@section('content')
    <!--Container-->
    <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">

      <!--Card-->
      <div id='recipients' class="p-8 mt-6 rounded shadow bg-white">


          <table id="products-table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
              <thead>
                  <tr>
                      <th data-priority="1">Name</th>
                      <th data-priority="2">Best Seller</th>
                      <th data-orderable="false">Image</th>
                      <th data-orderable="false">Action</th>
                  </tr>
              </thead>
              <tbody>
              </tbody>

          </table>


      </div>
      <!--/Card-->


  </div>
  <!--/container-->
@endsection
