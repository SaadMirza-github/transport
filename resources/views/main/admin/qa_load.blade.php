@include('partials.mainsite_pages.return_function')
<?php



?>
@foreach($get_user_orders as $val)
    <tr>
        <td>{{ get_user_name($val->assign_user_id)}}</td>
        <td>{{$val->created_at}}</td>
        <td>{{$val->order_id}}</td>
        <td><input name='comments[]' placeholder='Max Length 30' class='form-control' maxlength='30'></td>
        <td>
            <div class='rating-stars text-center'>
                <ul class='stars  padd' id='stars1'>
                    <li class='star' title='Poor' data-value='1'>
                        <i class='fa fa-star fa-fw'></i>
                    </li>
                    <li class='star' title='Fair' data-value='2'>
                        <i class='fa fa-star fa-fw'></i>
                    </li>
                    <li class='star' title='Good' data-value='3'>
                        <i class='fa fa-star fa-fw'></i>
                    </li>
                    <li class='star' title='Excellent' data-value='4'>
                        <i class='fa fa-star fa-fw'></i>
                    </li>
                    <li class='star' title='Excellent' data-value='5'>
                        <i class='fa fa-star fa-fw'></i>
                    </li>
                </ul>
                <input class='text-message' type='hidden' value="0" required name="rating_points[]">
                <input type='hidden' name='order_ids[]' value='${v.order_id}' required>
                <input type='hidden' name='user_id' value='${employeeid}' required>
            </div>
        </td>
    </tr>
@endforeach