@extends('admin.layout')
@section('content')
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>  {{ trans('labels.ShippingMethods') }} <small>{{ trans('labels.ShippingMethods') }}...</small> </h1>
    <ol class="breadcrumb">
      <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
      <li class="active"> {{ trans('labels.ShippingMethods') }}</li>
    </ol>
  </section>
  
  <!--  content -->
  <section class="content"> 
    <!-- Info boxes --> 
    
    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> {{ trans('labels.ShippingMethods') }} </h3>
          </div>
          
          <!-- /.box-header -->
          <div class="box-body">              		
          @if (count($errors) > 0)
              @if($errors->any())
            <div class="row">
              <div class="col-xs-12">
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  {{$errors->first()}}
                </div>
              </div>
            </div>
              @endif
          @endif
          
          <div class="row default-div hidden">
              <div class="col-xs-12">
                <div class="alert alert-success alert-dismissible" role="alert">
                  <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                  {{ trans('labels.ShippingMethodsChangedMessage') }}
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-xs-12">
                <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                  <thead>
                    <tr>
                      <th style="text-align: center;">{{ trans('labels.Default') }}</th>
                      <th style="text-align: center;">{{ trans('labels.ShippingTitle') }}</th>
                      <th style="text-align: center;">{{ trans('labels.Price') }}</th>
                      <th style="text-align: center;">{{ trans('labels.Status') }}</th>
                      <th style="text-align: center;">{{ trans('labels.Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($result['shipping_methods'] as $key=>$shipping_methods)
                        <tr>
                            <td>
                                <label>
                                  <input type="radio" name="shipping_methods_id" value="1" shipping_id = '{{ $shipping_methods->shipping_methods_id}}' class="default_method" @if($shipping_methods->isDefault==1) checked @endif >
                                </label>
                            </td>
                                  @if($shipping_methods->methods_type_link=='upsShipping' and $shipping_methods->shipping_methods_id=='1')
                                    <td>
                                        {{ $result['ups_shipping'][0]->title }}
                                    </td>
                                    <td>---</td>
                                    <td>
                                        @if($shipping_methods->status==0)
                                            <span class="label label-warning">
                                            	{{ trans('labels.InActive') }}
                                            </span>
                                        @else
                                       	    <a href="{{ URL::to("admin/shippingMethods")}}?id={{ $shipping_methods->shipping_methods_id}}&active=no" class="method-status">
                                            	{{ trans('labels.InActive') }}
                                            </a>
                                        @endif
                                        &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
                                        @if($shipping_methods->status==1)
                                            <span class="label label-success">
                                            	{{ trans('labels.Active') }}
                                            </span>
                                        @else
                                            <a href="{{ URL::to("admin/shippingMethods")}}?id={{ $shipping_methods->shipping_methods_id}}&active=yes" class="method-status">
                                                {{ trans('labels.Active') }}
                                            </a>
                                        @endif
                                    </td>
                                    <td><a href="{{ $shipping_methods->methods_type_link }}" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                           			</td>
                                 @endif
                                 
                                 @if($shipping_methods->methods_type_link=='freeShipping' and $shipping_methods->shipping_methods_id=='2')
                                    <td>
                                      {{ trans('labels.FreeShipping') }} 
                                    </td>
                                    <td>---</td>
                                    <td>
                                        @if($shipping_methods->status==0)
                                            <span class="label label-warning">
                                            	{{ trans('labels.InActive') }} 
                                            </span>
                                        @else
                                       	    <a href="{{ URL::to("admin/shippingMethods")}}?id={{ $shipping_methods->shipping_methods_id}}&active=no" class="method-status">
                                            	{{ trans('labels.InActive') }} 
                                            </a>
                                        @endif
                                        &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
                                        @if($shipping_methods->status==1)
                                            <span class="label label-success">
                                            	{{ trans('labels.Active') }} 
                                            </span>
                                        @else
                                            <a href="{{ URL::to("admin/shippingMethods")}}?id={{ $shipping_methods->shipping_methods_id}}&active=yes" class="method-status">
                                                {{ trans('labels.Active') }} 
                                            </a>
                                        @endif
                                    </td>
                                    <td>---</td>
                                 @endif
                                 
                                  @if($shipping_methods->methods_type_link=='localPickup' and $shipping_methods->shipping_methods_id=='3')
                                    <td>
                                        {{ trans('labels.LocalPickup') }}
                                    </td>
                                    <td>---</td>
                                    <td>
                                        @if($shipping_methods->status==0)
                                            <span class="label label-warning">
                                            	{{ trans('labels.InActive') }}
                                            </span>
                                        @else
                                       	    <a href="{{ URL::to("admin/shippingMethods")}}?id={{ $shipping_methods->shipping_methods_id}}&active=no" class="method-status">
                                            	{{ trans('labels.InActive') }}
                                            </a>
                                        @endif
                                        &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
                                        @if($shipping_methods->status==1)
                                            <span class="label label-success">
                                            	{{ trans('labels.Active') }}
                                            </span>
                                        @else
                                            <a href="{{ URL::to("admin/shippingMethods")}}?id={{ $shipping_methods->shipping_methods_id}}&active=yes" class="method-status">
                                               {{ trans('labels.Active') }} 
                                            </a>
                                        @endif
                                    </td>
                                    <td>---
                           			</td>
                                 @endif
                                 
                                 @if($shipping_methods->methods_type_link=='flateRate' and $shipping_methods->shipping_methods_id=='4')
                                    <td>
                                       {{ trans('labels.FlateRate') }} 
                                    </td>
                                    <td>{{ $result['flate_rate'][0]->currency }}{{ $result['flate_rate'][0]->flate_rate }} </td>
                                    <td>
                                        @if($shipping_methods->status==0)
                                            <span class="label label-warning">
                                            	{{ trans('labels.InActive') }}
                                            </span>
                                        @else
                                       	    <a href="{{ URL::to("admin/shippingMethods")}}?id={{ $shipping_methods->shipping_methods_id}}&active=no" class="method-status">
                                            	{{ trans('labels.InActive') }}
                                            </a>
                                        @endif
                                        &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
                                        @if($shipping_methods->status==1)
                                            <span class="label label-success">
                                            	{{ trans('labels.Active') }}
                                            </span>
                                        @else
                                            <a href="{{ URL::to("admin/shippingMethods")}}?id={{ $shipping_methods->shipping_methods_id}}&active=yes" class="method-status">
                                               {{ trans('labels.Active') }} 
                                            </a>
                                        @endif
                                    </td>
                                    <td><a href="{{ $shipping_methods->methods_type_link }}" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                           			</td>
                                 @endif
                                 
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
</div>
@endsection 