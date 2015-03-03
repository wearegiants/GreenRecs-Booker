
(function(w){
        if (document.querySelectorAll('input#calLoad').length) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'https://yerbaverde.local/freeschedule', true);
                xhr.onloadend = function () {
                   if (xhr.status >= 200 && xhr.status < 400) {
                    // Success!
                    var data = JSON.parse(xhr.responseText);
                    //sanitize the results into the appropriate formats.
                    Object.keys(data).forEach(function (inner) {
                      data[inner].forEach(function(item) {
                        item.id = parseInt(item.id);
                        item.opencount = parseInt(item.slots_available);
                        item.date = moment(item.availability_slot, 'YYYY-MM-DD HH:mm');
                        item.eventName = item.date.format('h:mm A');
                        delete item.slots_available, delete item.availability_slot;
                      });
                    });
                    window.events = data;
                    GetDays();
                    StartCarousel();
                  } else {
                    console.log(xhr.response)
                  }
                };
                xhr.send();
      }

      function GetDays() {
        days = Object.keys(events);
        cListUl = document.getElementById('scheduleList');
        days.forEach(function (iter) {
          var dayTitle, cSlideDay, slotList;

          cSlideDay = createElement('li', {'class' : 'day'});
          dayTitle = createElement('h3', {'class' : 'dayweek'}, moment(iter).format('dddd, MMM D'));
          slotList = eventSlotMarkup(events[iter]);

          cSlideDay.appendChild(dayTitle);
          cSlideDay.appendChild(slotList);
          cListUl.appendChild(cSlideDay);
        });
        
      }
      function eventSlotMarkup(list) {
        var sList = createElement('ul', {'class' : 'eventslist'});
        list.forEach(function (item) {

            eSlot = createElement('li', {'class' : 'event radio' + ((item.opencount > 0) ? ' open' : ' closed')});
            eSlotName = createElement('label', {'class': 'btn btn-default btn-lg', 'for' : item.date.format('MM-DD-H-m-s') + 'ID'+ item.id}, item.eventName);
            if (item.opencount > 0 ){
              inputRadio = createElement('input', 
                {
                'id': item.date.format('MM-DD-H-m-s') + 'ID'+ item.id,
                'type': 'radio', 
                'name': 'data[apptdata]', 
                'class': 'appointment-choice', 
                // 'checked': 'false', 
                'value': item.id,
                'autocomplete': 'off',
                'styles': 
                  {'visibility' : 'hidden'}
              });
              inputRadio.dataset.date = item.date.format('YYYY-MM-DD HH:mm');
              inputHidden = createElement('input', {
                'id': item.date.format('MM-DD-H-m-s') + 'ID'+ item.id,
                'type': 'hidden',
                'name': 'slotcount',
                'value': item.opencount
              });
              eSlotName.appendChild(inputRadio);
              eSlotName.appendChild(inputHidden);
            }
            sList.dataset.toggle = 'buttons';
            eSlot.appendChild(eSlotName);
            
            sList.appendChild(eSlot);
        });
        return sList;
      };

      function createElement(tagName, attr, innerText) {
        var ele = document.createElement(tagName);
        if(attr) {
          ele.setAttributes(attr);
        }
        if(innerText) {
          ele.innderText = ele.textContent = innerText;
        }
        return ele;
      };

      Element.prototype.setAttributes = function (attrs) {
          for (var idx in attrs) {
              if ((idx === 'styles' || idx === 'style') && typeof attrs[idx] === 'object') {
                  for (var prop in attrs[idx]){this.style[prop] = attrs[idx][prop];}
              } else if (idx === 'html') {
                  this.innerHTML = attrs[idx];
              } else {
                  this.setAttribute(idx, attrs[idx]);
              }
          }
      };

      function StartCarousel () {
            var sw = document.body.clientWidth,
            current = 0,
            breakpointSize = window.getComputedStyle(document.body,':after').getPropertyValue('content'),
            multiplier = 1, /*Determines the number of panels*/
            $carousel = $('.c'),
            $cList = $('.c-list'),
            $cWidth = $carousel.outerWidth(),
            $li = $('.c li.day'),
            $liLength = $li.size(),
            numPages = $liLength/multiplier,
            $prev = $('.c-nav .prev'),
            $next = $('.c-nav .next');
          
          $(document).ready(function() {
            buildCarousel();
          });
          
          
          $(window).resize(function(){ //On Window Resize
            sw = document.body.clientWidth;
            $cWidth = $carousel.width();
            breakpointSize = window.getComputedStyle(document.body,':after').getPropertyValue('content');  /* Conditional CSS http://adactio.com/journal/5429/ */
            sizeCarousel();
            posCarousel();
          });
          
          function sizeCarousel() { //Determine the size and number of panels to reveal
            current = 0;
            if (breakpointSize == 'medium') {
              multiplier = 2;
              
            } else if (breakpointSize == 'large') {
              multiplier = 3;
            } else {
              multiplier = 1;
            }
            
            animLimit = $liLength/multiplier-1;
            
            $li.outerWidth($cWidth/multiplier); //Set panel widths
            
          }
          
          
          function buildCarousel() { //Build the Carousel
            sizeCarousel();
          }
          
          function posCarousel() { //Animate Carousel. CSS transitions used for the actual animation.
            var pos = -current * $cWidth;
            $cList.css("left",pos);
          }
          
          $prev.click(function(e){ //Previous Button Click
            e.preventDefault();
            if(current>0) {
              current--;
            }
            posCarousel();
            
          });
          $next.click(function(e){ //Next Button Click
            e.preventDefault();
            if(current<animLimit) {
              current++;
            }
            posCarousel();
          });

          $('.btn').on('click', function (e) {
            $('.btn.active').removeClass('active');
            return;
          }); 
          $('input[type=radio]').on('change', function () {
            var RadioId = $('input[type=radio]:checked').attr('data-date');
            $('.modal').modal('toggle');
            $('#appointment-date-seed').text('You have selected '+ moment(RadioId).format('MMMM Do YYYY, h:mm a') + ' as your appointment time. If this is correct please confirm the appointment below.');
          });
          
      }
     

    })(this);
