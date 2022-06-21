    document.addEventListener('change', e => {
      if (e.target.matches('[name=start_date]')) {
        document.querySelector('#date_check').textContent = e.target.value;
      }
    });

    function hoge() {
      var valueA = document.getElementById("start_date").value;
      var valueB = document.getElementById("start_time").value;
      document.getElementById("start_at").value = valueA + valueB;
    };

    function TimeCheck() {
      let obj = document.getElementById('start_time');
      let idx = obj.selectedIndex;
      let txt = obj.options[idx].text;

      document.getElementById('time_check').textContent = txt;
    };

    function NumberCheck() {
      let obj = document.getElementById('num_of_users');
      let idx = obj.selectedIndex;
      let txt = obj.options[idx].text;

      document.getElementById('number_check').textContent = txt;
    };