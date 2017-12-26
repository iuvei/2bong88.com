<!DOCTYPE html>
<html>
  
<head>
    <title>Adminstrator</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>
    <meta content='Flat administration template for Twitter Bootstrap. Twitter Bootstrap 3 template with Ruby on Rails support.' name='description'>
    <link href='assets/images/meta_icons/favicon.ico' rel='shortcut icon' type='image/x-icon'>
    <link href='assets/images/meta_icons/apple-touch-icon.png' rel='apple-touch-icon-precomposed'>
    <link href='assets/images/meta_icons/apple-touch-icon-57x57.png' rel='apple-touch-icon-precomposed' sizes='57x57'>
    <link href='assets/images/meta_icons/apple-touch-icon-72x72.png' rel='apple-touch-icon-precomposed' sizes='72x72'>
    <link href='assets/images/meta_icons/apple-touch-icon-114x114.png' rel='apple-touch-icon-precomposed' sizes='114x114'>
    <link href='assets/images/meta_icons/apple-touch-icon-144x144.png' rel='apple-touch-icon-precomposed' sizes='144x144'>
     <link href="assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css" media="all" rel="stylesheet" type="text/css" />
    <link href="assets/stylesheets/plugins/fullcalendar/fullcalendar.css" media="all" rel="stylesheet" type="text/css" />
    <link href="assets/stylesheets/plugins/common/bootstrap-wysihtml5.css" media="all" rel="stylesheet" type="text/css" />
    <!-- / END - page related stylesheets [optional] -->
    <!-- / bootstrap [required] -->
    <link href="assets/stylesheets/bootstrap/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
    <!-- / theme file [required] -->
    <link href="assets/stylesheets/light-theme.css" media="all" id="color-settings-body-color" rel="stylesheet" type="text/css" />
    <!-- / coloring file [optional] (if you are going to use custom contrast color) -->
    <link href="assets/stylesheets/theme-colors.css" media="all" rel="stylesheet" type="text/css" />
    <!-- / demo file [not required!] -->
    
    <!--[if lt IE 9]>
      <script src="assets/javascripts/ie/html5shiv.js" type="text/javascript"></script>
      <script src="assets/javascripts/ie/respond.min.js" type="text/javascript"></script>
    <![endif]-->
  </head>
  <body class='contrast-red '>
    <header>
      <nav class='navbar navbar-default'>
        <a class='navbar-brand' href='azkv.php'>
		<?php if(strpos(Yii::app()->getRequest()->userAgent,'Android')===false){?>
          <img width="81" height="21" class="logo" alt="Flatty" src="assets/images/logo.svg" />
          <img width="21" height="21" class="logo-xs" alt="Flatty" src="assets/images/logo_xs.svg" />
		  <?php }?>
        </a>
        <a class='toggle-nav btn pull-left' href='#'>
          <i class='icon-reorder'></i>
        </a>
        <ul class='nav'>
          <li class='dropdown light only-icon'>
            
          </li>
		  <?php 
				$criteria = new CDbCriteria;
				$criteria->order = "Id DESC";
				$Notification = Notification::model()->findAllByAttributes(
					array(
					'viewed'=>0,
					),$criteria
				
				);
				
		  ?>
          <li class='dropdown medium only-icon widget'>
            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
              <i class='icon-rss'></i>
              <div class='label'><?php echo count($Notification) ?></div>
            </a>
            <ul class='dropdown-menu'>
			<?php if($Notification!==null){ ?>
			<?php foreach($Notification as $not){ ?>
              <li>
                <a href='azkv.php?r=notification/view&id=<?php echo $not->Id  ?>'>
                  <div class='widget-body'>
                    <div class='pull-left icon'>
                      <i class='<?php echo $not->type ?> text-success'></i>
                    </div>
                    <div class='pull-left text'>
                      <?php echo $not->Name ?>
                      <small class='text-muted'>just now</small>
                    </div>
                  </div>
                </a>
              </li>
              <li class='divider'></li>
              <?php }?>
			  <li class='widget-footer'>
                <a href='azkv.php?r=notification/admin'>All notifications</a>
              </li>
			  <?php }?>
            </ul>
          </li>
          <li class='dropdown dark user-menu'>
            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
              <img width="23" height="23" alt="Mila Kunis" src="assets/images/admin.png" />
              <span class='user-name'>Admin</span>
              <b class='caret'></b>
            </a>
            <ul class='dropdown-menu'>
              <li>
                <a href='<?php echo Yii::app()->request->baseUrl; ?>/azkv.php?r=adminweb/view&id=1'>
                  <i class='icon-user'></i>
                  Profile
                </a>
              </li>
              <li>
                <a href='<?php echo Yii::app()->request->baseUrl; ?>/azkv.php?r=adminweb/update&id=1'>
                  <i class='icon-cog'></i>
                  Settings
                </a>
              </li>
              <li class='divider'></li>
              <li>
                <a href='<?php echo Yii::app()->request->baseUrl; ?>/azkv.php?r=site/logout'>
                  <i class='icon-signout'></i>
                  Sign out
                </a>
              </li>
            </ul>
          </li>
        </ul>
        
      </nav>
    </header>
    <div id='wrapper'>
      <div id='main-nav-bg'></div>
      <nav id='main-nav'>
        <div class='navigation'>
          <div class='search'>
            <form action='' method='get'>
              <div class='search-wrapper'>
                <input value="" class="search-query form-control" placeholder="Search..." autocomplete="off" name="q" type="text" />
                <button class='btn btn-link icon-search' name='button' type='submit'></button>
              </div>
            </form>
          </div>
          <ul class='nav nav-stacked'>
            <li class='active'>
              <a href="/azkv.php">
                <i class='icon-dashboard'></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class=''>
                      <a class="dropdown-collapse" id="menu-1" data-id="1" href="#"><i class='icon-edit'></i>
              <span>Quản Lý Hệ Thống</span>
              <i class='icon-angle-down angle-down'></i>
              </a>
      
              <ul class='nav nav-stacked' id="ul-menu-1">
                <li class=''>
                  <a id="menu-1-a" data-id="1" href='<?php echo Yii::app()->request->baseUrl; ?>/azkv.php?r=order/admin'>
                    <i class='icon-caret-right'></i>
                    <span>Quản lý nạp - rút tiền</span>
                  </a>
                </li>
                
				<li class=''>
                  <a id="menu-30-a" data-id="30" href='<?php echo Yii::app()->request->baseUrl; ?>/azkv.php?r=betData/admin'>
                    <i class='icon-caret-right'></i>
                    <span>Quản lý dữ liệu cược</span>
                  </a>
                </li>
				
                
				
              </ul>
            </li>
            <li>
              <a class='dropdown-collapse' id="menu-2" data-id="2" href='#'>
                <i class='icon-tint'></i>
                <span>Cấu Hình</span>
                <i class='icon-angle-down angle-down'></i>
              </a>
              <ul class='nav nav-stacked' id="ul-menu-2" >
                <li class=''>
                  <a  id="menu-4-a" data-id="4" href='<?php echo Yii::app()->request->baseUrl; ?>/azkv.php?r=config/update&id=1'>
                    <i class='icon-caret-right'></i>
                    <span>Cấu hình hệ thống</span>
                  </a>
                </li>
                <li class=''>
                  <a  id="menu-5-a" data-id="5" href='<?php echo Yii::app()->request->baseUrl; ?>/azkv.php?r=adminweb/update&id=<?php echo Yii::app()->user->getId(); ?>'>
                    <i class='icon-caret-right'></i>
                    <span>Cấu hình admin</span>
                  </a>
                </li>
				<li class=''>
                  <a  id="menu-5-a" data-id="5" href='<?php echo Yii::app()->request->baseUrl; ?>/azkv.php?r=adminweb/create'>
                    <i class='icon-caret-right'></i>
                    <span>Tạo quản trị viên</span>
                  </a>
                </li>
				 <li class=''>
                  <a id="menu-7-a" data-id="7" href='<?php echo Yii::app()->request->baseUrl; ?>/azkv.php?r=Payment/update&id=1'>
                    <i class='icon-caret-right'></i>
                    <span>Pm</span>
                  </a>
                </li>
				 <li class=''>
                  <a id="menu-8-a" data-id="8" href='<?php echo Yii::app()->request->baseUrl; ?>/azkv.php?r=Ebank/update&id=1'>
                    <i class='icon-caret-right'></i>
                    <span>Cấu hình WMZ - BTC</span>
                  </a>
                </li>
				
				<li class=''>
                  <a  id="menu-6-a" data-id="6" href='<?php echo Yii::app()->request->baseUrl; ?>/azkv.php?r=Rate/update&id=1'>
                    <i class='icon-caret-right'></i>
                    <span>Cấu hình tỷ giá</span>
                  </a>
                </li>
              </ul>
            </li>
			
            
            <li class=''>
              <a id="menu-no-sub-1" data-id="1" href='<?php echo Yii::app()->request->baseUrl; ?>/azkv.php?r=user/admin' class="no-dropdown">
                <i class='icon-table'></i>
                <span>Quản lý user</span>
              </a>
            </li>
			<li class=''>
              <a id="menu-no-sub-1" data-id="144" href='<?php echo Yii::app()->request->baseUrl; ?>/azkv.php?r=statement/admin' class="no-dropdown">
                <i class='icon-table'></i>
                <span>Quản lý Statement</span>
              </a>
            </li>
            
            <li class=''>
              <a  id="menu-no-sub-2" data-id="2"  href='<?php echo Yii::app()->request->baseUrl; ?>/azkv.php?r=log/admin' class="no-dropdown">
                <i class='icon-font'></i>
                <span>Nhật ký hệ thống</span>
              </a>
            </li>
            
			

		 </ul>
        </div>
      </nav>
     
	  <section id='content'>
	       <div class='container'>
		    <div class='row' id='content-wrapper'>
            <div class='col-xs-12'>
			
			<?php echo $content ?>
			 </div>
          </div>
			</div>
	 </section>
	 
	 
	</div>
    <!-- / jquery [required] -->
	<?php

$controller = Yii::app()->getController();
$isHome = $controller->action->id;

if($isHome!="admin")
echo '<script src="assets/javascripts/jquery/jquery.min.js" type="text/javascript"></script>';
?>
   
    <!-- / jquery mobile (for touch events) -->
    <script src="assets/javascripts/jquery/jquery.mobile.custom.min.js" type="text/javascript"></script>
    <!-- / jquery migrate (for compatibility with new jquery) [required] -->
    <script src="assets/javascripts/jquery/jquery-migrate.min.js" type="text/javascript"></script>
    <!-- / jquery ui -->
    <script src="assets/javascripts/jquery/jquery-ui.min.js" type="text/javascript"></script>
    <!-- / jQuery UI Touch Punch -->
    <script src="assets/javascripts/plugins/jquery_ui_touch_punch/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
    <!-- / bootstrap [required] -->
    <script src="assets/javascripts/bootstrap/bootstrap.js" type="text/javascript"></script>
    <!-- / modernizr -->
    <script src="/assets/javascripts/plugins/jquery-cookie/jquery.cookie.js" type="text/javascript"></script>
    <!-- / theme file [required] -->
    <script src="assets/javascripts/theme.js" type="text/javascript"></script>
    <!-- / demo file [not required!] -->
<script src="assets/javascripts/plugins/common/moment.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.js" type="text/javascript"></script>
	 <script src="assets/javascripts/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
	  <script src="assets/javascripts/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
	 <script src="assets/javascripts/plugins/timeago/jquery.timeago.js" type="text/javascript"></script>
	
    
     
	   <script src="assets/javascripts/plugins/select2/select2.js" type="text/javascript"></script>
   
    <script src="assets/javascripts/plugins/slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
   
    <script src="assets/javascripts/plugins/common/wysihtml5.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/common/bootstrap-wysihtml5.js" type="text/javascript"></script>
	<script src="assets/javascripts/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script>
      (function() {
        var cal, calendarDate, d, m, y;
      
        this.setDraggableEvents = function() {
          return $("#events .external-event").each(function() {
            var eventObject;
            eventObject = {
              title: $.trim($(this).text())
            };
            $(this).data("eventObject", eventObject);
            return $(this).draggable({
              zIndex: 999,
              revert: true,
              revertDuration: 0
            });
          });
        };
      
        setDraggableEvents();
      
        calendarDate = new Date();
      
        d = calendarDate.getDate();
      
        m = calendarDate.getMonth();
      
        y = calendarDate.getFullYear();
      
        cal = $(".full-calendar-demo").fullCalendar({
          header: {
            center: "title",
            left: "basicDay,basicWeek,month",
            right: "prev,today,next"
          },
          buttonText: {
            prev: "<span class=\"icon-chevron-left\"></span>",
            next: "<span class=\"icon-chevron-right\"></span>",
            today: "Today",
            basicDay: "Day",
            basicWeek: "Week",
            month: "Month"
          },
          droppable: true,
          editable: true,
          selectable: true,
          select: function(start, end, allDay) {
            return bootbox.prompt("Event title", function(title) {
              if (title !== null) {
                cal.fullCalendar("renderEvent", {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                }, true);
                return cal.fullCalendar('unselect');
              }
            });
          },
          eventClick: function(calEvent, jsEvent, view) {
            return bootbox.dialog({
              message: $("<form class='form'><label>Change event name</label></form><input id='new-event-title' class='form-control' type='text' value='" + calEvent.title + "' /> "),
              buttons: {
                "delete": {
                  label: "<i class='icon-trash'></i> Delete Event",
                  className: "pull-left",
                  callback: function() {
                    return cal.fullCalendar("removeEvents", function(ev) {
                      return ev._id === calEvent._id;
                    });
                  }
                },
                success: {
                  label: "<i class='icon-save'></i> Save",
                  className: "btn-success",
                  callback: function() {
                    calEvent.title = $("#new-event-title").val();
                    return cal.fullCalendar('updateEvent', calEvent);
                  }
                }
              }
            });
          },
          drop: function(date, allDay) {
            var copiedEventObject, eventClass, originalEventObject;
            originalEventObject = $(this).data("eventObject");
            originalEventObject.id = Math.floor(Math.random() * 99999);
            eventClass = $(this).attr('data-event-class');
            console.log(originalEventObject);
            copiedEventObject = $.extend({}, originalEventObject);
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            if (eventClass) {
              copiedEventObject["className"] = [eventClass];
            }
            $(".full-calendar-demo").fullCalendar("renderEvent", copiedEventObject, true);
            if ($("#calendar-remove-after-drop").is(":checked")) {
              return $(this).remove();
            }
          },
          events: [
            {
              id: "event1",
              title: "All Day Event",
              start: new Date(y, m, 1),
              className: 'event-orange'
            }, {
              id: "event2",
              title: "Long Event",
              start: new Date(y, m, d - 5),
              end: new Date(y, m, d - 2),
              className: "event-red"
            }, {
              id: 999,
              id: "event3",
              title: "Repeating Event",
              start: new Date(y, m, d - 3, 16, 0),
              allDay: false,
              className: "event-blue"
            }, {
              id: 999,
              id: "event3",
              title: "Repeating Event",
              start: new Date(y, m, d + 4, 16, 0),
              allDay: false,
              className: "event-green"
            }, {
              id: "event4",
              title: "Meeting",
              start: new Date(y, m, d, 10, 30),
              allDay: false,
              className: "event-orange"
            }, {
              id: "event5",
              title: "Lunch",
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false,
              className: "event-red"
            }, {
              id: "event6",
              title: "Birthday Party",
              start: new Date(y, m, d + 1, 19, 0),
              end: new Date(y, m, d + 1, 22, 30),
              allDay: false,
              className: "event-purple"
            }
          ]
        });
      
      }).call(this);
    </script>
	<script>
      $(".chat .new-message").live('submit', function(e) {
        var chat, date, li, message, months, reply, scrollable, sender, timeago;
        date = new Date();
        months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        chat = $(this).parents(".chat");
        message = $(this).find("#message_body").val();
        $(this).find("#message_body").val("");
        if (message.length !== 0) {
          li = chat.find("li.message").first().clone();
          li.find(".body").text(message);
          timeago = li.find(".timeago");
          timeago.removeClass("in");
          var month = (date.getMonth() + 1);
          var date_day = (date.getDate());
          timeago.attr("title", "" + (date.getFullYear()) + "-" + (month<10 ? '0' : '') + month + "-" + (date_day<10 ? '0' : '' ) + date_day + " " + (date.getHours()) + ":" + (date.getMinutes()) + ":" + (date.getSeconds()) + " +0200");
          timeago.text("" + months[date.getMonth()] + " " + (date.getDate()) + ", " + (date.getFullYear()) + " " + (date.getHours()) + ":" + (date.getMinutes()));
          setTimeAgo(timeago);
          sender = li.find(".name").text().trim();
          chat.find("ul").append(li);
          scrollable = li.parents(".scrollable");
          $(scrollable).slimScroll({
            scrollTo: scrollable.prop('scrollHeight') + "px"
          });
          li.effect("highlight", {}, 500);
          reply = scrollable.find("li").not(":contains('" + sender + "')").first().clone();
          setTimeout((function() {
            date = new Date();
            timeago = reply.find(".timeago");
            timeago.attr("title", "" + (date.getFullYear()) + "-" + (month<10 ? '0' : '') + month + "-" + (date_day<10 ? '0' : '' ) + date_day + " " + (date.getHours()) + ":" + (date.getMinutes()) + ":" + (date.getSeconds()) + " +0200");
            timeago.text("" + months[date.getMonth()] + " " + (date.getDate()) + ", " + (date.getFullYear()) + " " + (date.getHours()) + ":" + (date.getMinutes()));
            setTimeAgo(timeago);
            scrollable.find("ul").append(reply);
            $(scrollable).slimScroll({
              scrollTo: scrollable.prop('scrollHeight') + "px"
            });
            return reply.effect("highlight", {}, 500);
          }), 1000);
        }
        return e.preventDefault();
      });
    </script>
    <script>
      $(".recent-activity .ok").live("click", function(e) {
        $(this).tooltip("hide");
        $(this).parents("li").fadeOut(500, function() {
          return $(this).remove();
        });
        return e.preventDefault();
      });
      $(".recent-activity .remove").live("click", function(e) {
        $(this).tooltip("hide");
        $(this).parents("li").fadeOut(500, function() {
          return $(this).remove();
        });
        return e.preventDefault();
      });
      $("#comments-more-activity").live("click", function(e) {
        $(this).button("loading");
        setTimeout((function() {
          var list;
          list = $("#comments-more-activity").parent().parent().find("ul");
          list.append(list.find("li:not(:first)").clone().effect("highlight", {}, 500));
          return $("#comments-more-activity").button("reset");
        }), 1000);
        e.preventDefault();
        return false;
      });
      $("#users-more-activity").live("click", function(e) {
        $(this).button("loading");
        setTimeout((function() {
          var list;
          list = $("#users-more-activity").parent().parent().find("ul");
          list.append(list.find("li:not(:first)").clone().effect("highlight", {}, 500));
          return $("#users-more-activity").button("reset");
        }), 1000);
        e.preventDefault();
        return false;
      });
    </script>
    <script>
      (function() {
        $("#daterange").daterangepicker({
          ranges: {
            Yesterday: [moment().subtract("days", 1), moment().subtract("days", 1)],
            "Last 30 Days": [moment().subtract("days", 29), moment()],
            "This Month": [moment().startOf("month"), moment().endOf("month")]
          },
		  format: 'D/M/YYYY',
          startDate: moment().subtract("days", 29),
          endDate: moment(),
          opens: "left",
          cancelClass: "btn-danger",
          buttonClasses: ['btn', 'btn-sm']
        }, function(start, end) {
		
			$.ajax({
		
		type: "POST",
		url: "/azkv.php?r=site/SearchOrder",
		data: "time_search="+start.format("YYYY-M-D")+"&time_end="+end.format("YYYY-M-D"),
		dataType : 'json',
		success : function (data){
		
			$("#bet-win").html(data.win);
			
			$("#bet-total-win").html(data.totalwin);
			$("#bet-hoa").html(data.hoa);
			$("#bet-lost").html(data.lost);
			$("#bet-total-lost").html(data.totallost);
			$("#bet-win-lost").html(data.win+data.lost);
			$("#bet-running").html(data.totalRunning);
		
		},
		});
          return $("#daterange span").html(start.format("D/M/YYYY") + " - " + end.format("D/M/YYYY"));
        });
      
      }).call(this);
    </script>
    <script>
      $(".todo-list .new-todo").live('submit', function(e) {
        var li, todo_name;
        todo_name = $(this).find("#todo_name").val();
        $(this).find("#todo_name").val("");
        if (todo_name.length !== 0) {
          li = $(this).parents(".todo-list").find("li.item").first().clone();
          li.find("input[type='checkbox']").attr("checked", false);
          li.removeClass("important").removeClass("done");
          li.find("label.todo span").text(todo_name);
          $(".todo-list ul").first().prepend(li);
          li.effect("highlight", {}, 500);
        }
        return e.preventDefault();
      });
      
      $(".todo-list .actions .remove").live("click", function(e) {
        $(this).tooltip("hide");
        $(this).parents("li").fadeOut(500, function() {
          return $(this).remove();
        });
        e.stopPropagation();
        e.preventDefault();
        return false;
      });
      
      $(".todo-list .actions .important").live("click", function(e) {
        $(this).parents("li").toggleClass("important");
        e.stopPropagation();
        e.preventDefault();
        return false;
      });
      
      $(".todo-list .check").live("click", function() {
        var checkbox;
        checkbox = $(this).find("input[type='checkbox']");
        if (checkbox.is(":checked")) {
          return $(this).parents("li").addClass("done");
        } else {
          return $(this).parents("li").removeClass("done");
        }
      });
	  
	 $("#time-today").click(function(){
		
		$.ajax({
		
		type: "POST",
		url: "/azkv.php?r=site/SearchOrder",
		data: "time_search=<?php echo date("Y-m-d",time()) ?>",
		dataType : 'json',
		success : function (data){
		
			$("#bet-win").html(data.win);
			
			$("#bet-total-win").html(data.totalwin);
			$("#bet-hoa").html(data.hoa);
			$("#bet-lost").html(data.lost);
			$("#bet-total-lost").html(data.totallost);
			$("#bet-win-lost").html(data.win+data.lost);
			$("#bet-running").html(data.totalRunning);
		
		},
		error :function(obj)
		{
		
		
			alert(obj);
		
		
		},
		
		});
		
		return false;
	 
	 });
	 
	 $("#time-this-month").click(function(){
		
		$.ajax({
		<?php 
			
			$m = date('m',time());
			$y = date('Y',time());
			$first_day = $y."-".$m."-01";
			
		?>
		type: "POST",
		url: "/azkv.php?r=site/SearchOrder",
		data: "time_search=<?php echo $first_day ?>&time_end=<?php echo date("Y-m-d",time()) ?>",
		dataType : 'json',
		success : function (data){
		
			$("#bet-win").html(data.win);
			
			$("#bet-total-win").html(data.totalwin);
			$("#bet-hoa").html(data.hoa);
			$("#bet-lost").html(data.lost);
			$("#bet-total-lost").html(data.totallost);
			$("#bet-win-lost").html(data.win+data.lost);
			$("#bet-running").html(data.totalRunning);
		
		},
		error :function(obj)
		{
		
		
			alert(obj);
		
		
		},
		
		});
		
		return false;
	 
	 });
   
	$("#time-this-week").click(function(){
		
		$.ajax({
		<?php 
			
			$monday = strtotime('last monday', strtotime('tomorrow'));
		?>
		type: "POST",
		url: "/azkv.php?r=site/SearchOrder",
		data: "time_search=<?php echo date('Y-m-d',$monday) ; ?>&time_end=<?php echo date("Y-m-d",time()) ?>",
		dataType : 'json',
		success : function (data){
		
			$("#bet-win").html(data.win);
			
			$("#bet-total-win").html(data.totalwin);
			$("#bet-hoa").html(data.hoa);
			$("#bet-lost").html(data.lost);
			$("#bet-total-lost").html(data.totallost);
			$("#bet-win-lost").html(data.win+data.lost);
			$("#bet-running").html(data.totalRunning);
		
		},
		error :function(obj)
		{
		
		
			
		
		
		},
		
		});
		
		return false;
	 
	 });
   
	
   </script>
	
</html>
