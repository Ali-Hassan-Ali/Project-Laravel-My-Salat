@extends('dashboard_owner.layout.master')

@section('title', __('dashboard.dashboard') . ' | ' . __('dashboard.calendar'))

@section('content')

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div class="calendar-upper-section">
                        <div class="row">
                            <div class="col-md-8 col-12">
                                <div class="labels">
                                    {{-- <p class="label label-primary">Work</p> --}}
                                    <p class="label label-warning">@lang('admin.waiting')</p>
                                    <p class="label label-success">@lang('admin.completed')</p>
                                    <p class="label label-danger">@lang('admin.cancel')</p>
                                </div>
                            </div>                                                
                            <div class="col-md-4 col-12">
                                <form action="javascript:void(0);" class="form-horizontal mt-md-0 mt-3 text-md-right text-center">
                                    <button id="myBtn" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar mr-2">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                        @lang('statics.create_order')
                                     </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>

        <!-- The Modal -->
        <div id="addEventsModal" class="modal animated fadeIn">

            <div class="modal-dialog modal-dialog-centered">
                
                <!-- Modal content -->
                <div class="modal-content">

                    <div class="modal-body">

                        <span class="close">&times;</span>

                        <div class="add-edit-event-box">
                            <div class="add-edit-event-content">
                                <h5 class="add-event-title modal-title">@lang('statics.create_order')</h5>
                                <h5 class="edit-event-title modal-title">Edit Events</h5>

                                <form action="{{ route('dashboard.owner.create.new.order') }}" method="post">
                                    @csrf
                                    @method('post')

                                    <div class="row">

                                        <div class="col-md-12">
                                            <label for="start-date">@lang('owner.groom_name')</label>
                                            <div class="d-flex event-title">
                                                <input name="groom_name" type="text" placeholder="Enter Title" class="form-control" name="task">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-12">
                                            <div class="form-group start-date">
                                                <label for="start-data">@lang('statics.event_data')</label>
                                                <div class="d-flex">
                                                    <input name="event_data" placeholder="Start Date" class="form-control" type="date">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-12">
                                            <div class="form-group start-date">
                                                <label for="start-date">@lang('statics.event_time')</label>
                                                <div class="d-flex">
                                                    <input name="event_time" placeholder="Start Date" class="form-control" type="time">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-12">
                                            <div class="form-group start-date">
                                                <label for="start-date">@lang('statics.primary_key_type')</label>
                                                <div class="d-flex">
                                                    <input name="primary_key_type" placeholder="Start Date" class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-12">
                                            <div class="form-group start-date">
                                                <label for="start-date">@lang('statics.primary_key_number')</label>
                                                <div class="d-flex">
                                                    <input name="primary_key_number" placeholder="Start Date" class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-12">
                                            <div class="form-group end-date">
                                                <label>@lang('owner.packages')</label>
                                                <select name="packages_id" class="selectpicker form-control">
                                                    <option value="">@lang('owner.no_categorey')</option>
                                                    @foreach ($packages as $package)
                                                        
                                                        <option value="{{ $package->id }}">
                                                            {{ $package->name }} : @lang('dashboard.price') : {{ $package->price }}
                                                        </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <div class="form-group end-date">
                                                <label>@lang('admin.bookings')</label>
                                                <select name="event_sort" class="selectpicker form-control">
                                                    <option value="">@lang('owner.no_categorey')</option>
                                                    @foreach ($bookings as $booking)
                                                        
                                                        <option value="{{ $booking->name }}">
                                                            {{ $booking->name }}
                                                        </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        @foreach ($service_categorys as $category)

                                            <div class="col-12 mt-4">
                                                <div class="form-group end-date">
                                                    <label>{{ $category->name }}</label>
                                                    <select name="service_id[]" class="selectpicker form-control">
                                                        <option value="">@lang('owner.no_categorey')</option>
                                                        @foreach ($category->service as $data)
                                                            
                                                            <option value="{{ $data->id }}">
                                                                {{ $data->name }} : @lang('dashboard.price') : {{ $data->price }}
                                                            </option>

                                                        @endforeach
                                                    </select>
                                                </div>

                                                @if ($category->allow_quantity == true)
                                                    <div class="form-group mt-4">
                                                        <label>Quntty</label>
                                                        <input type="number" name="quantity_service_id[{{ $category->id }}]" class="form-control">
                                                    </div>
                                                @endif

                                            </div>

                                        @endforeach
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="start-date" class="">@lang('dashboard.description')</label>
                                            <div class="d-flex event-description">
                                                <textarea id="taskdescription" name="note" placeholder="Enter Description" rows="3" class="form-control" name="taskdescription"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="event-badge">
                                                <p class="">@lang('statics.status_order')</p>

                                                <div class="d-sm-flex d-block">

                                                    <div class="n-chk">
                                                        <label class="new-control new-radio radio-warning">
                                                            <input type="radio" class="new-control-input" value="2" name="order_statuses_id" value="bg-warning" required>
                                                            <span class="new-control-indicator"></span>@lang('admin.waiting')
                                                        </label>
                                                    </div>

                                                    <div class="n-chk">
                                                        <label class="new-control new-radio radio-success">
                                                            <input type="radio" class="new-control-input" value="1" name="order_statuses_id" value="bg-success" required>
                                                            <span class="new-control-indicator"></span>@lang('admin.completed')
                                                        </label>
                                                    </div>

                                                    <div class="n-chk">
                                                        <label class="new-control new-radio radio-danger">
                                                            <input type="radio" class="new-control-input" value="3" name="order_statuses_id" value="bg-danger" required>
                                                            <span class="new-control-indicator"></span>@lang('admin.cancel')
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                        <button id="add-e" class="btn">adddd</button>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button id="discard" class="btn" data-dismiss="modal">@lang('admin.cancel')</button>
                        <button id="add-e" class="btn">@lang('statics.create_order')</button>
                        <button id="edit-event" class="btn">Save</button>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@push('fullcalendar')
    <script type="text/javascript">
        $(document).ready(function() {

    // Get the modal
    var modal = document.getElementById("addEventsModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the Add Event button
    var addEvent = document.getElementById("add-e");
    // Get the Edit Event button
    var editEvent = document.getElementById("edit-event");
    // Get the Discard Modal button
    var discardModal = document.querySelectorAll("[data-dismiss='modal']")[0];
    
    // Get the Add Event button
    var addEventTitle = document.getElementsByClassName("add-event-title")[0];
    // Get the Edit Event button
    var editEventTitle = document.getElementsByClassName("edit-event-title")[0];

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Get the all <input> elements insdie the modal
    var input = document.querySelectorAll('input[type="text"]');
    var radioInput = document.querySelectorAll('input[type="radio"]');

    // Get the all <textarea> elements insdie the modal
    var textarea = document.getElementsByTagName('textarea');

    // Create BackDrop ( Overlay ) Element
    function createBackdropElement () {
        var btn = document.createElement("div");
        btn.setAttribute('class', 'modal-backdrop fade show')
        document.body.appendChild(btn);
    }

    // Reset radio buttons

    function clearRadioGroup(GroupName) {
      var ele = document.getElementsByName(GroupName);
        for(var i=0;i<ele.length;i++)
        ele[i].checked = false;
    }

    // Reset Modal Data on when modal gets closed
    function modalResetData() {
        modal.style.display = "none";
        for (i = 0; i < input.length; i++) {
            input[i].value = '';
        }
        for (j = 0; j < textarea.length; j++) {
            textarea[j].value = '';
          i
        }
        clearRadioGroup("marker");
        // Get Modal Backdrop
        var getModalBackdrop = document.getElementsByClassName('modal-backdrop')[0];
        document.body.removeChild(getModalBackdrop)
    }

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
        addEvent.style.display = 'block';
        editEvent.style.display = 'none';
        addEventTitle.style.display = 'block';
        editEventTitle.style.display = 'none';
        document.getElementsByTagName('body')[0].style.overflow = 'hidden';
        createBackdropElement();
        enableDatePicker();
    }

    // Clear Data and close the modal when the user clicks on Discard button
    discardModal.onclick = function() {
        modalResetData();
        document.getElementsByTagName('body')[0].removeAttribute('style');
    }

    // Clear Data and close the modal when the user clicks on <span> (x).
    span.onclick = function() {
        modalResetData();
        document.getElementsByTagName('body')[0].removeAttribute('style');
    }

    // Clear Data and close the modal when the user clicks anywhere outside of the modal.
    window.onclick = function(event) {
        if (event.target == modal) {
            modalResetData();
            document.getElementsByTagName('body')[0].removeAttribute('style');
        }
    }

    newDate = new Date()
    monthArray = [ '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12' ]

    function getDynamicMonth( monthOrder ) {
        var getNumericMonth = parseInt(monthArray[newDate.getMonth()]);
        var getNumericMonthInc = parseInt(monthArray[newDate.getMonth()]) + 1;
        var getNumericMonthDec = parseInt(monthArray[newDate.getMonth()]) - 1;

        if (monthOrder === 'default') {

            if (getNumericMonth < 10 ) {
                return '0' + getNumericMonth;
            } else if (getNumericMonth >= 10) {
                return getNumericMonth;
            }

        } else if (monthOrder === 'inc') {

            if (getNumericMonthInc < 10 ) {
                return '0' + getNumericMonthInc;
            } else if (getNumericMonthInc >= 10) {
                return getNumericMonthInc;
            }

        } else if (monthOrder === 'dec') {

            if (getNumericMonthDec < 10 ) {
                return '0' + getNumericMonthDec;
            } else if (getNumericMonthDec >= 10) {
                return getNumericMonthDec;
            }
        }
    }

    /* initialize the calendar
    -----------------------------------------------------------------*/

    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: [

            @foreach ($orders as $order)
                {
                    id: 'event-' + "{{ $order->id }}",
                    title: '{{ $order->groom_name }}',
                    start: "{{ date('Y', strtotime($order->event_data)) }}" + '-'+ "{{ date('m', strtotime($order->event_data)) }}"  +'-{{ date('d', strtotime($order->event_data)) }}T{{ $order->event_time }}',
                    end: "{{ date('Y', strtotime($order->event_data)) }}" + '-'+ "{{ date('m', strtotime($order->event_data)) }}"  +'-{{ date('d', strtotime($order->event_data)) }}T{{ $order->event_time }}',
                    className: "{{ $order->status }}",
                    description: '{{ $order->note }}'
                },
            @endforeach
            

        ],
        editable: true,
        eventLimit: true,
        eventMouseover: function(event, jsEvent, view) {
            $(this).attr('id', event.id);

            $('#'+event.id).popover({
                template: '<div class="popover popover-primary" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
                title: event.title,
                content: event.description,
                placement: 'top',
            });

            $('#'+event.id).popover('show');
        },
        eventMouseout: function(event, jsEvent, view) {
            $('#'+event.id).popover('hide');
        },
        eventClick: function(info) {

            addEvent.style.display = 'none';
            editEvent.style.display = 'block';

            addEventTitle.style.display = 'none';
            editEventTitle.style.display = 'block';
            modal.style.display = "block";
            document.getElementsByTagName('body')[0].style.overflow = 'hidden';
            createBackdropElement();

            // Calendar Event Featch
            var eventTitle = info.title;
            var eventDescription = info.description;

            // Task Modal Input
            var taskTitle = $('#write-e');
            var taskTitleValue = taskTitle.val(eventTitle);

            var taskDescription = $('#taskdescription');
            var taskDescriptionValue = taskDescription.val(eventDescription);

            var taskInputStarttDate = $("#start-date");
            var taskInputStarttDateValue = taskInputStarttDate.val(info.start.format("YYYY-MM-DD HH:mm:ss"));

            var taskInputEndDate = $("#end-date");
            var taskInputEndtDateValue = taskInputEndDate.val(info.end.format("YYYY-MM-DD HH:mm:ss"));
        
            var startDate = flatpickr(document.getElementById('start-date'), {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                defaultDate: info.start.format("YYYY-MM-DD HH:mm:ss"),
            });

            var abv = startDate.config.onChange.push(function(selectedDates, dateStr, instance) {
                var endtDate = flatpickr(document.getElementById('end-date'), {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    minDate: dateStr
                });
            })

            var endtDate = flatpickr(document.getElementById('end-date'), {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                defaultDate: info.end.format("YYYY-MM-DD HH:mm:ss"),
                minDate: info.start.format("YYYY-MM-DD HH:mm:ss")
            });

            $('#edit-event').off('click').on('click', function(event) {
                event.preventDefault();
                /* Act on the event */
                var radioValue = $("input[name='marker']:checked").val();

                var taskStartTimeValue = document.getElementById("start-date").value;
                var taskEndTimeValue = document.getElementById("end-date").value;

                info.title = taskTitle.val();
                info.description = taskDescription.val();
                info.start = taskStartTimeValue;
                info.end = taskEndTimeValue;
                info.className = radioValue;

                $('#calendar').fullCalendar('updateEvent', info);
                modal.style.display = "none";
                modalResetData();
                document.getElementsByTagName('body')[0].removeAttribute('style');
            });
        }
    })
    

    function enableDatePicker() {
        var startDate = flatpickr(document.getElementById('start-date'), {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: new Date()
        });

        var abv = startDate.config.onChange.push(function(selectedDates, dateStr, instance) {

            var endtDate = flatpickr(document.getElementById('end-date'), {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                minDate: dateStr
            });
        })

        var endtDate = flatpickr(document.getElementById('end-date'), {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: new Date()
        });
    }


    function randomString(length, chars) {
        var result = '';
        for (var i = length; i > 0; --i) result += chars[Math.round(Math.random() * (chars.length - 1))];
        return result;
    }
    $("#add-e").off('click').on('click', function(event) {
        


        var radioValue = $("input[name='marker']:checked").val();
        var randomAlphaNumeric = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
        var inputValue = $("#write-e").val();
        var inputStarttDate = document.getElementById("start-date").value;
        var inputEndDate = document.getElementById("end-date").value;

        var arrayStartDate = inputStarttDate.split(' ');

        var arrayEndDate = inputEndDate.split(' ');

        var startDate = arrayStartDate[0];
        var startTime = arrayStartDate[1];

        var endDate = arrayEndDate[0];
        var endTime = arrayEndDate[1];

        var concatenateStartDateTime = startDate+'T'+startTime+':00';
        var concatenateEndDateTime = endDate+'T'+endTime+':00';

        var inputDescription = document.getElementById("taskdescription").value;
        var myCalendar = $('#calendar');
        myCalendar.fullCalendar();
        var myEvent = {
          timeZone: 'UTC',
          allDay : false,
          id: randomAlphaNumeric,
          title:inputValue,
          start: concatenateStartDateTime,
          end: concatenateEndDateTime,
          className: radioValue,
          description: inputDescription
        };
        myCalendar.fullCalendar( 'renderEvent', myEvent, true );
        modal.style.display = "none";
        modalResetData();
        document.getElementsByTagName('body')[0].removeAttribute('style');
    });


    // Setting dynamic style ( padding ) of the highlited ( current ) date

    function setCurrentDateHighlightStyle() {
        getCurrentDate = $('.fc-content-skeleton .fc-today').attr('data-date');
        if (getCurrentDate === undefined) {
            return;
        }
        splitDate = getCurrentDate.split('-');
        if (splitDate[2] < 10) {
            $('.fc-content-skeleton .fc-today .fc-day-number').css('padding', '3px 8px');
        } else if (splitDate[2] >= 10) {
            $('.fc-content-skeleton .fc-today .fc-day-number').css('padding', '3px 4px');
        }
    }
    setCurrentDateHighlightStyle();

    const mailScroll = new PerfectScrollbar('.fc-scroller', {
        suppressScrollX : true
    });
    
    var fcButtons = document.getElementsByClassName('fc-button');
    for(var i = 0; i < fcButtons.length; i++) {
        fcButtons[i].addEventListener('click', function() {
            const mailScroll = new PerfectScrollbar('.fc-scroller', {
                suppressScrollX : true
            });        
            $('.fc-scroller').animate({ scrollTop: 0 }, 100);
            setCurrentDateHighlightStyle();
        })
    }
});
    </script>
@endpush