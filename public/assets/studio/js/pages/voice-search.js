//[Voice Javascript]


  function startDictation() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "en-US";
      recognition.start();

      recognition.onresult = function(e) {
        document.getElementById('transcript').value
                                 = e.results[0][0].transcript;
        recognition.stop();
        document.getElementById('labnol').submit();
      };

      recognition.onerror = function(e) {
        recognition.stop();
      }

    }
  }

	$(".tst4").on("click", function () {
        $.toast({
            heading: 'Voice Search',
            text: 'Supported Only on Google Chrome Browser',
            position: 'top-center',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 10000

        });

    });
