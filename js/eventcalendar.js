(function() {

  var today = moment();

  function Calendar(selector, events) {
    this.el = document.querySelector(selector);
    this.events = events;
    this.current = moment().date(1);
    this.draw();
    var current = document.querySelector('.today');
    if(current) {
      var self = this;
      window.setTimeout(function() {
        self.openDay(current);
      }, 500);
    }
  }

  Calendar.prototype.draw = function() {
    //Create Header
    this.drawHeader();

    //Draw Month
    this.drawMonth();

    // this.drawLegend();
  }

  Calendar.prototype.drawHeader = function() {
    var self = this;
    if(!this.header) {
      //Create the header elements
      this.header = createElement('div', 'header');
      this.header.className = 'header';

      this.title = createElement('h2', 'month-title');

      var right = createElement('div', 'right');
      right.addEventListener('click', function() { self.nextMonth(); });

      var left = createElement('div', 'left');
      left.addEventListener('click', function() { self.prevMonth(); });

      //Append the Elements
      this.header.appendChild(this.title); 
      this.header.appendChild(right);
      this.header.appendChild(left);
      this.el.appendChild(this.header);
    }

    this.title.innerHTML = this.current.format('MMMM YYYY');
  }

  Calendar.prototype.drawMonth = function() {

    var self = this;

    if(this.month) {
      this.oldMonth = this.month;
      this.oldMonth.className = 'month out ' + (self.next ? 'next' : 'prev');
      this.oldMonth.addEventListener('webkitAnimationEnd', function() {
        self.oldMonth.parentNode.removeChild(self.oldMonth);
        self.month = createElement('div', 'month');
        self.backFill();
        self.currentMonth();
        self.fowardFill();
        self.el.appendChild(self.month);
        window.setTimeout(function() {
          self.month.className = 'month in ' + (self.next ? 'next' : 'prev');
        }, 16);
      });
    } else {
        this.month = createElement('div', 'month');
        this.el.appendChild(this.month);
        this.backFill();
        this.currentMonth();
        this.fowardFill();
        this.month.className = 'month new';
    }
  }

  Calendar.prototype.backFill = function() {
    var clone = this.current.clone();
    var dayOfWeek = clone.day();

    if(!dayOfWeek) { return; }

    clone.subtract('days', dayOfWeek+1);

    for(var i = dayOfWeek; i > 0 ; i--) {
      this.drawDay(clone.add('days', 1));
    }
  }

  Calendar.prototype.fowardFill = function() {
    var clone = this.current.clone().add('months', 1).subtract('days', 1);
    var dayOfWeek = clone.day();

    if(dayOfWeek === 6) { return; }

    for(var i = dayOfWeek; i < 6 ; i++) {
      this.drawDay(clone.add('days', 1));
    }
  }

  Calendar.prototype.currentMonth = function() {
    var clone = this.current.clone();

    while(clone.month() === this.current.month()) {
      this.drawDay(clone);
      clone.add('days', 1);
    }
  }

  Calendar.prototype.getWeek = function(day) {
    if(!this.week || day.day() === 0) {
      this.week = createElement('div', 'week');
      this.month.appendChild(this.week);
    }
  }

  Calendar.prototype.drawDay = function(day) {
    var self = this;
    this.getWeek(day);

    //Outer Day
    var outer = createElement('div', this.getDayClass(day));
    outer.addEventListener('click', function() {
      self.openDay(this);
    });

    //Events
    // var eventsents = createElement('div', 'day-events');
    // this.drawEvents(day, events);

    //Day Name
    var name = createElement('div', 'day-name', day.format('ddd'));

    //Day Number
    var number = createElement('div', 'day-number', day.format('DD'));


    outer.appendChild(name);
    outer.appendChild(number);
    // outer.appendChild(events);
    this.week.appendChild(outer);
  }

//Depricating this because we aren't using event indicators.
/*  Calendar.prototype.drawEvents = function(day, element) {
    if(day.month() === this.current.month()) {
      var todaysEvents = this.events.reduce(function(memo, ev) {
        if(ev.date.isSame(day, 'day')) {
          memo.push(ev);
        }
        return memo;
      }, []);

      todaysEvents.forEach(function(ev) {
        var evSpan = createElement('span', ev.color);
        element.appendChild(evSpan);
      });
    }
  }*/

  Calendar.prototype.getDayClass = function(day) {
    classes = ['day'];
    if(day.month() !== this.current.month()) {
      classes.push('other');
    } else if (today.isSame(day, 'day')) {
      classes.push('today');
    }
    todaysDate = moment();
    if (todaysDate.diff(day, 'day') >= 1) {
      classes.push('expired');
    }
    return classes.join(' ');
  }

  Calendar.prototype.openDay = function(el) {
    var details, arrow;
    var dayNumber = +el.querySelectorAll('.day-number')[0].innerText || +el.querySelectorAll('.day-number')[0].textContent;
    var day = this.current.clone().date(dayNumber);

    var currentOpened = document.querySelector('.details');

    //don't open the detail view for expired dates for appointments.
    if (el.classList.contains('expired')) {
      return false;
    }

    //Check to see if there is an open detais box on the current row
    if(currentOpened && currentOpened.parentNode === el.parentNode) {
      details = currentOpened;
      arrow = document.querySelector('.arrow');
    } else {
      //Close the open events on differnt week row
      //currentOpened && currentOpened.parentNode.removeChild(currentOpened);
      if(currentOpened) {
        currentOpened.addEventListener('webkitAnimationEnd', function() {
          currentOpened.parentNode.removeChild(currentOpened);
        });
        currentOpened.addEventListener('oanimationend', function() {
          currentOpened.parentNode.removeChild(currentOpened);
        });
        currentOpened.addEventListener('msAnimationEnd', function() {
          currentOpened.parentNode.removeChild(currentOpened);
        });
        currentOpened.addEventListener('animationend', function() {
          currentOpened.parentNode.removeChild(currentOpened);
        });
        currentOpened.className = 'details out';
      }

      //Create the Details Container
      details = createElement('div', 'details in');

      //Create the arrow
      var arrow = createElement('div', 'arrow');

      //Create the event wrapper

      details.appendChild(arrow);
      el.parentNode.appendChild(details);
    }

    var todaysEvents = this.events.reduce(function(memo, ev) {
      if(ev.date.isSame(day, 'day')) {
        memo.push(ev);
      }
      return memo;
    }, []);

    this.renderEvents(todaysEvents, details);

    //go up a level to figure out all the elements in this week div
    var weekDaysInSet = el.parentNode.children;
    //flatten the HTMLCollection back down to an array
    weekDaysInSet = [].slice.call(weekDaysInSet);
    //get the index of our element in this collection
    var dayIndex = weekDaysInSet.indexOf(el);
    //Old pixel based arrow methodology
    // arrow.style.left = el.offsetLeft - el.parentNode.offsetLeft + 27 + 'px';

    //New Percentage based arrow methodlogy
    arrow.style.left = ((dayIndex + 1) * 14.285 - (14.285 / 2) - 0.50) + '%';
  }

  Calendar.prototype.renderEvents = function(events, ele) {
    //Remove any events in the current details element
    var currentWrapper = ele.querySelector('.events');
    var wrapper = createElement('div', 'events in' + (currentWrapper ? ' new' : ''));
    var viewEvents = [];
    var chunkSize = 6;

    for (i=0,j=events.length; i<j; i+=chunkSize) {
      eventsChunk = events.slice(i,i+chunkSize);

      var btngroup = createElement('div', 'col-md-3 panel panel-default');
      
      var btnbody = createElement('div', 'panel-body btn-group-vertical');
      btnbody.setAttribute('data-toggle', 'buttons');

      //iterate over each event in the chunk to mark it up in html 
      eventsChunk.forEach(function(ev) {
        var button = createElement('label', 'event btn btn-default');
        setAttributes(button, {'iso-date' : ev.date.format(), 'id' : ev.id, 'for' : 'data[apptdate]'});

        var inputRadio = createElement('input', '');
        setAttributes(inputRadio, {
          'type' : 'radio',
          'autocomplete' : 'off', 
          'name' : 'data[apptdate]',
          'value' : ev.id, 
          'iso-date' : ev.date.format(), 
          'id' : ev.id
        });

        var span = createElement('span', '', ev.eventName);
        var slotsLeft = createElement('span', 'openslot label label-default', ev.opencount + ' slots left');
        button.appendChild(inputRadio);
        button.appendChild(span);
        button.appendChild(slotsLeft);
        //doing this so we can later unbind all these events for garabage collection.
        viewEvents.push(button);

        btnbody.appendChild(button);
      });

      //append it to the button group and the group to the wrapper at large
      btngroup.appendChild(btnbody);
      wrapper.appendChild(btngroup);
    }

    

    if(!events.length) {
      var div = createElement('div', 'event empty');
      var span = createElement('span', 'noslot', ' No Appointments Availible On This Day ');
      div.appendChild(span);
      wrapper.appendChild(div);
    }

    bindClickButtons = function () {
      //bind each button element to the mousedown event action
      viewEvents.forEach(function (eventItem) {
        eventItem.addEventListener('mousedown', function() {
          if (!this.querySelectorAll('input').checked) {
            clearRadio();
            this.classList.add('active');
            this.querySelectorAll('input').checked = true;
            setAttributes(this.querySelectorAll('input')[0], {'checked' : true});
          }
          var dateProp = this.querySelectorAll('input')[0].getAttribute('iso-date');
          var appointmentEl = createElement('div', 'appointment msg col-md-12', ' You have selected ' + moment(dateProp).format('dddd, MMMM Do YYYY [at] h:mm a') + ' as your appointment time. ');

          var submitbtn = createElement('button', 'btn btn-default clr-btn pull-right', 'Request This Time');
          setAttributes(submitbtn, {'data-form-id' : 'calendarform'});
          appointmentEl.appendChild(submitbtn);
          wrapper.parentNode.insertBefore(appointmentEl, wrapper.parentNode.firstChild);
        });
      });
    };
    //so because we like to keep our nodes tidy, 
    //we remove the event queue on each click of this and rebuild it from scratch
    // this means we actually always remove the previous list on each date node click.
    if(currentWrapper) {
      currentWrapper.className = 'events out';
      currentWrapper.addEventListener('webkitAnimationEnd', function() {
        currentWrapper.parentNode.removeChild(currentWrapper);
        ele.appendChild(wrapper);
        clearDetailHeader();
        bindClickButtons();
      });
      currentWrapper.addEventListener('oanimationend', function() {
        currentWrapper.parentNode.removeChild(currentWrapper);
        ele.appendChild(wrapper);
        clearDetailHeader();
        bindClickButtons();
      });
      currentWrapper.addEventListener('msAnimationEnd', function() {
        currentWrapper.parentNode.removeChild(currentWrapper);
        ele.appendChild(wrapper);
        clearDetailHeader();
        bindClickButtons();
      });
      currentWrapper.addEventListener('animationend', function() {
        currentWrapper.parentNode.removeChild(currentWrapper);
        ele.appendChild(wrapper);
        clearDetailHeader();
        bindClickButtons();
      });
    } else {
      ele.appendChild(wrapper);
      clearDetailHeader();
      bindClickButtons();
    }
  }

  //Depricated for this project.
  /*Calendar.prototype.drawLegend = function() {
    var legend = createElement('div', 'legend');
    var calendars = this.events.map(function(e) {
      return e.calendar + '|' + e.color;
    }).reduce(function(memo, e) {
      if(memo.indexOf(e) === -1) {
        memo.push(e);
      }
      return memo;
    }, []).forEach(function(e) {
      var parts = e.split('|');
      var entry = createElement('span', 'entry ' +  parts[1], parts[0]);
      legend.appendChild(entry);
    });
    this.el.appendChild(legend);
  }*/

  Calendar.prototype.nextMonth = function() {
    this.current.add('months', 1);
    this.next = true;
    this.draw();
  }

  Calendar.prototype.prevMonth = function() {
    this.current.subtract('months', 1);
    this.next = false;
    this.draw();
  }

  window.Calendar = Calendar;

  function setAttributes(el, attrs) {
    for(var key in attrs) {
      el.setAttribute(key, attrs[key]);
    }
  }

  function createElement(tagName, className, innerText) {
    var ele = document.createElement(tagName);
    if(className) {
      ele.className = className;
    }
    if(innerText) {
      ele.innderText = ele.textContent = innerText;
    }
    return ele;
  }

  function clearRadio () {
    var AllPresentRadios = document.querySelectorAll('#calendar .event>input[type="radio"]');
    clearDetailHeader();
    //clear out all the previous radio buttons on this calendar, this is we don't have two selected radio buttons at the same time.  
    for (var it = 0, arrlen = AllPresentRadios.length; it < arrlen; it++) {
      AllPresentRadios[it].checked = false;
      AllPresentRadios[it].removeAttribute('checked');
      if (AllPresentRadios[it].parentNode.classList.contains('active')) {
        AllPresentRadios[it].parentNode.classList.remove('active');
      }
    }
  }

  function clearDetailHeader() {
    // remove prior messages in the header.
    [].forEach.call(
      document.querySelectorAll('div.appointment.msg'), 
      function(el){
        if (el) {
          el.parentNode.removeChild(el);
        }
      }
    );
  }


})();

(function() {
  var data = [
    { id: 0, date: moment().hour(9) , eventName: '9:00 AM', opencount: 2 },
    { id: 1, date: moment().hour(10) , eventName: '10:00 AM', opencount: 3  },
    { id: 2, date: moment().hour(11) , eventName: '11:00 AM', opencount: 1  },
    { id: 3, date: moment().hour(12) , eventName: '12:00 PM', opencount: 5  },

    { id: 4, date: moment(), eventName: '1:00 PM', opencount: 1  },
    { id: 5, date: moment(), eventName: '2:00 PM', opencount: 4  },
    { id: 6, date: moment(), eventName: '3:00 PM', opencount: 1  },
    { id: 7, date: moment(), eventName: '4:00 PM', opencount: 6  },

    { id: 8, date: moment(), eventName: '5:00 PM',  opencount: 2  },
    { id: 9, date: moment(), eventName: '6:00 PM',  opencount: 2  },
    { id: 10, date: moment(), eventName: '7:00 PM',  opencount: 1  },
    { id: 11, date: moment(), eventName: '8:00 PM',  opencount: 3  },

    { id: 12, date: moment().add(1, 'day').hour(9) , eventName: '9:00 PM', opencount: 1  },
    { id: 13, date: moment().add(1, 'day').hour(10) , eventName: '10:00 AM', opencount: 3  },
    { id: 14, date: moment().add(1, 'day').hour(11) , eventName: '11:00 AM', opencount: 2  },
    { id: 15, date: moment().add(1, 'day').hour(12) , eventName: '12:00 AM', opencount: 4  }
  ];

  

  function addDate(ev) {
    
  }

  var calendar = new Calendar('#calendar', data);

})();
