
<?php $this->assets->outputJs(); ?>

<div class="container">
<div id="" class=" heading col-md-7"><h3>Task List CRUD</h3><h6> PhalconPHP/JQuery..<small>[ 02/09/2018 ] -Ak0</small></h6><br>

<br>
    <div class="input-group mb-3">
        <form action="/poll/new" method="post">
        <input type="text" class="form-control" placeholder="New Todo Task" aria-label="New Task" aria-describedby="basic-addon2" name="question">
        <div class="input-group-append" style="display: inline;">
        </div>
        </form>
    </div>
    <br>
    <br>
    <div class="list-group">
            {% for poll in polls %}
                {% if poll.completed == '1' %}
                    <a href="#" class="list-group-item disabled">
                        <span class="glyphicon glyphicon-ok float-left"></span>
                    <div id="todo-{{ poll.id }}" class="disabled  btn-dark float-left text-sm-left" style="display: inline;"> {{ poll.question }} </div>
                    </a>
                {% else %}
                        <a href="#" class="list-group-item ">
                            <div id="todo-{{ poll.id }}" class=" float-left text-sm-left"> {{ poll.question }} </div></a>

                {% endif %}



        {% endfor %}

    </div>

    <span class="float-right text-md-right">
                        <button id="edit" class="btn btn-md-secondary"><span class=" glyphicon glyphicon-edit">Edit</span></button>
                        <button id="mark" class="btn btn-md-secondary" ><span class=" glyphicon glyphicon-check">Finish</span></button>
                       <button id="delete"  class="btn btn-md-secondary"><span class=" glyphicon glyphicon-remove">Remove</span></button>
                    </span>

</div>
<div id="result" class="alert alert-info" style="display:none; width:200px; height:30px;position:absolute; top:400px;
    left: 60px;float:right;padding:0px 10px 10px; margin:0 auto;font-family:monospace; "></div>


</div>
</div>



<script>
    $('.list-group-item').click(function () {


        if ( $(this).hasClass("list-group-item-secondary") ) {
            $(this).prop('contenteditable', false);

        } else if(!$(this).hasClass('disabled'))
        {
            $(".list-group-item").removeClass('list-group-item-secondary');
            $(this).addClass('list-group-item-secondary');
            $(this).children(1).prop('contenteditable', true);
        }

    });

    $('.btn').click(function () {
        var current_slot = $('.list-group').find('a.list-group-item-secondary').children().attr('id');;
        var id = current_slot.split('-')[1];
        console.log(id);
        var action = $(this).attr('id');
        console.log(action);
        $("#result").fadeIn("slow");
        if ($(this).attr('id') == 'edit'){
            var question = $('.list-group').find('a.list-group-item-secondary').children().text();
            $( "#result" ).load( "/poll/"+action+'/'+id, {question: question}, function(){
                location.reload();

            });

        }
        else {
            $("#result").load("/poll/" + action + '/' + id, function(){
                location.reload();
            });
                    }

        $("#result").fadeOut('slow');


    });
</script>
