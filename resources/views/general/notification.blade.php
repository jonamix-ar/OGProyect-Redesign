<div id="message-wrapper">
	<a class=" comm_menu messages tooltip js_hideTipOnMobile"
		href="game.php?page=messages"
		title="{{$message_count}} {{$nt_unread_messages}}">
		<span class="new_msg_count totalMessages news {{$message_alert}}" data-new-messages="1">
			{{$message_count}}
		</span>
	</a>
	<a class=" comm_menu chat tooltip js_hideTipOnMobile"
		href="https://s145-ar.ogproyect.gameforge.com/game/index.php?page=chat"
		title="1 nuevos mensaje(s)">
		<span class="new_msg_count totalChatMessages noMessage" data-new-messages="0">
			0
		</span>
	</a>
	<div id="messages_collapsed">
		<div id="eventboxFilled" class="eventToggle" style="display: none;">
			<a id="js_eventDetailsClosed" class="tooltipRight js_hideTipOnMobile"
				href="javascript:void(0);" title="{{$nt_more_details}}"></a>
			<a id="js_eventDetailsOpen" class="tooltipRight open js_hideTipOnMobile"
				href="javascript:void(0);" title="{{$nt_less_details}}"></a>
		</div>
		<div id="eventboxLoading" class="textCenter textBeefy" style="display: block;">
			<img height="16" width="16" alt="ajax spinner"
				src="img/ajax-loader.gif" />
			{{$nt_loading}}
		</div>
		<div id="eventboxBlank" class="textCenter" style="display: none;">
			{{$nt_no_fleet_movement}}
		</div>
	</div>
	<div id="attack_alert" class="tooltip {{$attack_alert}}" title="">
		<a href="game.php?page=componentOnly&amp;component=eventList"
			class=" tooltipHTML js_hideTipOnMobile"></a>
	</div>
</div>