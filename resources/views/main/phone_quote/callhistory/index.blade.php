@include('partials.mainsite_pages.return_function')
@foreach($data as $val)
    <div class="message-feed media">
        <div class="media-body">
            <div class="mf-content">
                <h6>User: {{ucfirst(get_user_name($val->userId))}}</h6>
                <?php echo $val->history ?>
                <strong class="mf-date"><i class="fa fa-clock-o"></i> <?php echo $val->created_at ?></strong>
            </div>

        </div>
    </div>
@endforeach


