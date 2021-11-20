<script>
      function createCookie(name, value, days) {
          var expires = '',
              date = new Date();
          if (days) {
              date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
              expires = '; expires=' + date.toGMTString();
          }
          document.cookie = name + '=' + value + expires + '; path=/';
      }

      function readCookie(name) {
          var cookies = document.cookie.split(';'),
              length = cookies.length,
              i,
              cookie,
              nameEQ = name + '=';
          for (i = 0; i < length; i += 1) {
              cookie = cookies[i];
              while (cookie.charAt(0) === ' ') {
                  cookie = cookie.substring(1, cookie.length);
              }
              if (cookie.indexOf(nameEQ) === 0) {
                  return cookie.substring(nameEQ.length, cookie.length);
              }
          }
          return null;
      }
      
</script>
