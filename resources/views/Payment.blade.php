<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    :root {
  --field-border: 1px solid #EEEEEE;
  --accent-color: #2962FF;
  --sidebar-color: #F1F1F1;
  --secondary-text: #aaaaaa;
  --radius-sm: .25em;
  --radius-md: .50em;
}

* { box-sizing: border-box; }

.flex {
  display: flex;
}
.flex-center {
  display: flex;
  align-items: center;
  justify-content: center;
}
.flex-fill {
  display: flex;
  flex: 1 1;
}
.flex-vertical {
  display: flex;
  flex-direction: column;
}
.flex-vertical-center {
  display: flex;
  align-items: center;
}
.flex-between {
  display: flex;
  justify-content: space-between;
}
.p-sm  { padding: .5em; }
.pl-sm { padding-left: .5em; }
.pr-sm { padding-right: .5em; }
.pb-sm { padding-bottom: .5em; }
.p-md  { padding: 1em; }
.pb-md { padding-bottom: 1em; }
.p-lg  { padding: 2em; }
.m-md  { margin: 1em; }
.size-md { font-size: .85em; }
.size-lg { font-size: 1.5em; }
.size-xl { font-size: 2em; }
.half-width { width: 50%; }

.pointer { cursor: pointer; }
.uppercase{ text-transform: uppercase; }
.ellipsis { text-overflow: ellipsis; overflow: hidden; }

.f-main-color { color: #2962FF; }
.f-secondary-color { color: var(--secondary-text); }
.b-main-color { background: var(--accent-color); }
.numbers::-webkit-outer-spin-button,
.numbers::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

body {
  font-size: 14px;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.screen {
  position: absolute;
  left: 0;
  bottom: 0;
  right: 0;
  top: 0;
  background: #E3F2FD;
}

.popup {
  position: relative;
  width: 50em;
  height: 35em;
  background: #FFFFFF;
  overflow-x: hidden;
  overflow-y: auto;
}
.popup .close-btn {
  position: absolute;
  right: 0;
  top: 0;
  background: #FCFCFC;
  border-bottom-left-radius: var(--radius-sm);
  transition: background-color .25s ease-in-out;
}
.popup .close-btn:hover {
  background: #EF5350;
}
.header {
  padding-bottom: 1em;
}
.sidebar {
  width: 16.5em;
  padding-left: 2em;
  padding-top: 5em;
}

.header .title {
  font-size: 1.2em;
}
.header .title span {
  font-weight: 300;
}

.card-data > div {
  padding-bottom: 1.5em;
}
.card-data > div:first-child {
  padding-top: 1.5em;
}

.card-property-title {
  display: flex;
  flex-direction: column;
  flex: 1 1;
  margin-right: 0.5em;
}
.card-property-title strong {
  padding-bottom: .5em;
  font-size: .85em;
}
.card-property-title span {
  color: var(--secondary-text);
  font-size: .75em;
}
.card-property-value {
  flex: 1 1;
}

.card-number {
  background: #fafafa;
  border: var(--field-border);
  border-radius: var(--radius-md);
  padding: .5em 1em;
}
.card-number-field * { line-height: 1; margin: 0; padding: 0;}
.card-number-field input { 
  width: 3em;
  height: 100%;
  padding: .5em 0;
  margin: 0 .75em;
  border: none;
  color: #888888;
  background: transparent;
  text-align: center;
  font-family: inherit;
  font-weight: 500;
}

.timer span {
  background: #311B92;
  color: #FFFFFF;
  width: 1.2em;
  padding: 4px 0;
  display: inline-block;
  text-align: center;
  border-radius: var(--radius-sm);
}
.timer span+span {
    margin-left: 2px;
}
.timer em {
  font-style: normal;
}

.action button {
  padding: 1.1em;
  width: 100%;
  height: 100%;
  font-weight: 600;
  font-size: 1em;
  color: #FFFFFF;
  border: none;
  border-radius: var(--radius-md);
  transition: background-color .2s ease-in-out;
}
.action button:hover {
  background: #2979FF;
}

.input-container {
  position: relative;
  display: flex;
  align-items: center;
  height: 3em;
  overflow: hidden;
  border: var(--field-border);
  border-radius: var(--radius-md);
}
.input-container input, 
.input-container i {
  line-height: 1;
}
.input-container input {
  flex: 1 1;
  height: 100%;
  width: 100%;
  text-align: center;
  border: none;
  border-radius: var(--radius-md);
  font-family: inherit;
  font-weight: 800;
  font-size: .85em;
}
.input-container input:focus {
  background: #E3F2FD;
  color: #283593;
}
.input-container input::placeholder {
  color: #ddd;
}
.input-container input::-webkit-outer-spin-button,
.input-container input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.input-container i {
  position: absolute;
  right: 0.5em;
}

.purchase-section {
  position: relative;
  overflow: visible;
  padding: 0 1em 1em 1em;
  background: var(--sidebar-color);
  border-top-left-radius: .8em;
  border-top-right-radius: .8em;
}
.purchase-section:before {
  content: '';
  position: absolute;
  width: 1.6em;
  height: 1.6em;
  border-radius: 50%;
  left: -0.8em;
  bottom: -0.8em;
  background: #FFFFFF;
}
.purchase-section:after {
  content: '';
  position: absolute;
  width: 1.6em;
  height: 1.6em;
  border-radius: 50%;
  right: -0.8em;
  bottom: -0.8em;
  background: #FFFFFF;
}

.card-mockup {
  position: relative;
  margin: -5em 1em 1.5em 1em;
  padding: 1.5em 1.2em;
  height: 15em;
  border-radius: var(--radius-md);
  background: #FFFFFF;
  box-shadow: 0 .5em 1em .125em rgba(0,0,0, 0.1);
}
.card-mockup:after {
  content: '';
  position: absolute;
  width: 25%;
  top: -.2em;
  left: 37.5%;
  height: .2em;
  background: var(--accent-color);
  border-top-left-radius: .2em;
  border-top-right-radius: .2em;
}
.card-mockup:before {
  content: '';
  position: absolute;
  top: 0;
  width: 25%;
  left: 37.5%;
  height: 0.5em;
  background: #2962ff36;
  border-bottom-left-radius: 0.2em;
  border-bottom-right-radius: 0.2em;
  box-shadow: 0 2px 15px 5px #2962ff4d;
}

.purchase-props {
  margin: 0;
  padding: 0;
  font-size: .8em;
  width: 100%;
}
.purchase-props li {
  width: 100%;
  line-height: 2.5;
}
.purchase-props li span {
  color: var(--secondary-text);
  font-weight: 600;
}

.separation-line {
  border-top: 1px dashed #aaa;
  margin: 0 .8em;
}

.total-section {
  position: relative;
  overflow: hidden;
  
  padding: 1em;
  background: var(--sidebar-color);
  border-bottom-left-radius: .8em;
  border-bottom-right-radius: .8em;
}
.total-section:before {
  content: '';
  position: absolute;
  width: 1.6em;
  height: 1.6em;
  border-radius: 50%;
  left: -0.8em;
  top: -0.8em;
  background: #FFFFFF;
}
.total-section:after {
  content: '';
  position: absolute;
  width: 1.6em;
  height: 1.6em;
  border-radius: 50%;
  right: -0.8em;
  top: -0.8em;
  background: #FFFFFF;
}
.total-label {
  font-size: 0.8em;
  padding-bottom: 0.5em;
}
.total-section strong {
  font-size: 1.5em;
  font-weight: 800;
}
.total-section small {
  font-weight: 600;
}
</style>
{{-- input1+2+3+4--}}

<body>
<div class="screen flex-center">
  @if ($errors->any())
  <div class="error-message">
      <p>Errors occurred:</p>
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
<form class="popup flex p-lg" method="post" action="{{ route('payment.store', ['id' => $id]) }}" onsubmit="combineCardNumber()">
  @csrf
    <div class="close-btn pointer flex-center p-sm">
      <i class="ai-cross"></i>
    </div>
    
      <!-- CARD FORM -->
      <div class="flex-fill flex-vertical">
        <div class="header flex-between flex-vertical-center">
          <div class="flex-vertical-center">
            <i class="ai-bitcoin-fill size-xl pr-sm f-main-color"></i>
            <span class="title">
              <strong>Payment</strong><span>Pay</span>
            </span>
          </div>
          {{-- <div class="timer" data-id="timer">
            <span>0</span><span>5</span>
            <em>:</em>
            <span>0</span><span>0</span>
          </div> --}}
        </div>
        <div class="card-data flex-fill flex-vertical">
          
          <!-- Card Number -->
          <div class="flex-between flex-vertical-center">
            <div class="card-property-title">
              <strong>Card Number</strong>
              <span>Enter 16-digit card number on the card</span>
            </div>
            {{-- <div class="f-main-color pointer"><i class="ai-pencil"></i> Edit</div> --}}
          </div>
          
          <!-- Card Field -->
          <div class="flex-between">
            <div class="card-number flex-vertical-center flex-fill">
              <div class="card-number-field flex-vertical-center flex-fill">
                
                
<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="24px" height="24px"><path fill="#ff9800" d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z"/><path fill="#d50000" d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z"/><path fill="#ff3d00" d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z"/></svg>
                
                
                
                <!--
<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="24px" height="24px"><path fill="#F44336" d="M33 11A13 13 0 1 0 33 37A13 13 0 1 0 33 11Z"/><path fill="#2196F3" d="M28,24h-8c0-0.682,0.068-1.347,0.169-2h7.661c-0.105-0.685-0.255-1.354-0.464-2h-6.732c0.225-0.694,0.508-1.362,0.84-2h5.051c-0.369-0.709-0.804-1.376-1.293-2h-2.465c0.379-0.484,0.79-0.941,1.233-1.367c-0.226-0.218-0.455-0.432-0.696-0.633c-2.252-1.872-5.146-3-8.304-3C7.82,11,2,16.82,2,24s5.82,13,13,13c3.496,0,6.664-1.388,9-3.633c0.443-0.426,0.854-0.883,1.232-1.367h-2.465c-0.489-0.624-0.923-1.291-1.293-2h5.051c0.333-0.638,0.616-1.306,0.841-2h-6.732c-0.209-0.646-0.358-1.315-0.464-2h7.661C27.932,25.347,28,24.682,28,24z"/></svg>
                -->
                
                <!--
<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="24px" height="24px"><path fill="#1565C0" d="M45,35c0,2.209-1.791,4-4,4H7c-2.209,0-4-1.791-4-4V13c0-2.209,1.791-4,4-4h34c2.209,0,4,1.791,4,4V35z"/><path fill="#FFF" d="M15.186 19l-2.626 7.832c0 0-.667-3.313-.733-3.729-1.495-3.411-3.701-3.221-3.701-3.221L10.726 30v-.002h3.161L18.258 19H15.186zM17.689 30L20.56 30 22.296 19 19.389 19zM38.008 19h-3.021l-4.71 11h2.852l.588-1.571h3.596L37.619 30h2.613L38.008 19zM34.513 26.328l1.563-4.157.818 4.157H34.513zM26.369 22.206c0-.606.498-1.057 1.926-1.057.928 0 1.991.674 1.991.674l.466-2.309c0 0-1.358-.515-2.691-.515-3.019 0-4.576 1.444-4.576 3.272 0 3.306 3.979 2.853 3.979 4.551 0 .291-.231.964-1.888.964-1.662 0-2.759-.609-2.759-.609l-.495 2.216c0 0 1.063.606 3.117.606 2.059 0 4.915-1.54 4.915-3.752C30.354 23.586 26.369 23.394 26.369 22.206z"/><path fill="#FFC107" d="M12.212,24.945l-0.966-4.748c0,0-0.437-1.029-1.573-1.029c-1.136,0-4.44,0-4.44,0S10.894,20.84,12.212,24.945z"/></svg>
                -->

                <input class="numbers" name="number1" type="number" min="0" max="9999" maxlength="4" placeholder="0000" id="numberInput" onblur="combineCardNumber();" oninput="limitInput(this)"  required>-
                <input class="numbers" name="number2" type="number" min="0" max="9999" maxlength="4" placeholder="0000" id="numberInput" onblur="combineCardNumber();" oninput="limitInput(this)" required>-
                <input class="numbers" name="number3" type="number" min="0" max="9999" maxlength="4" placeholder="0000" id="numberInput" onblur="combineCardNumber();" oninput="limitInput(this)">-
                <input class="numbers" name="number4" type="number" min="0" max="9999" maxlength="4" placeholder="0000" data-bound="carddigits_mock" data-def="0000" id="numberInput" onblur="combineCardNumber();"  oninput="limitInput(this);" required>
                <input type="hidden" id="card_number"   name="card_number">
                
              </div>
              <i class="ai-circle-check-fill size-lg f-main-color"></i>
            </div>
          </div>
          
          <!-- Expiry Date -->
          <div class="flex-between">
            <div class="card-property-title">
              <strong>Expiry Date</strong>
              <span>Enter the expiration date of the card</span>
            </div>
            <div class="card-property-value flex-vertical-center">
              <div class="input-container half-width">
                <input class="numbers" name="MM" data-bound="mm_mock" data-def="00" type="number" min="1" max="12" step="1" placeholder="MM" required>  
              </div>
              <span class="m-md">/</span>
              <div class="input-container half-width">
                <input class="numbers" name="YY" data-bound="yy_mock" data-def="01" type="number" min="23" max="99" step="1" placeholder="YY" required>
              </div>
            </div>
          </div>
          
          <!-- CCV Number -->
          <div class="flex-between">
            <div class="card-property-title">
              <strong>CVC Number</strong>
              <span>Enter card verification code from the back of the card</span>
            </div>
            <div class="card-property-value">
              <div class="input-container">
                <input id="cvc" type="password" name="CVC" required>
                <i id="cvc_toggler" data-target="cvc" class="ai-eye-open pointer"></i>
              </div>
            </div>
          </div>
          
          <!-- Name -->
          <div class="flex-between">
            <div class="card-property-title">
              <strong>Cardholder Name</strong>
              <span>Enter cardholder's name</span>
            </div>
            <div class="card-property-value">
              <div class="input-container">
                <input id="name" name="Cardholder" data-bound="name_mock" data-def="Mr. Cardholder" type="text" class="uppercase" placeholder="CARDHOLDER NAME" required>
                <i class="ai-person"></i>
              </div>
            </div>
          </div>
          
          
        </div>
        <div class="action flex-center">
          <button type="submit" class="b-main-color pointer" onclick="combineCardNumber();" >Pay Now</button>
        </div>
      </div>
    
      <!-- SIDEBAR -->
      <div class="sidebar flex-vertical">
        <div>
        
        </div>
        <div class="purchase-section flex-fill flex-vertical">
          
          <div class="card-mockup flex-vertical">
            <div class="flex-fill flex-between">
              <i class="ai-bitcoin-fill size-xl f-secondary-color"></i>
              <i class="ai-wifi size-lg f-secondary-color"></i>
            </div>
            <div>
              <div id="name_mock" class="size-md pb-sm uppercase ellipsis">mr. Cardholder</div>
              <div class="size-md pb-md">
                <strong>
                  <span class="pr-sm">
                    &#x2022;&#x2022;&#x2022;&#x2022;
                  </span>
                  <span id="carddigits_mock">0000</span>
                </strong>
              </div>
              <div class="flex-between flex-vertical-center">
                <strong class="size-md">
                  <span id="mm_mock">00</span>/<span id="yy_mock">01</span>
                </strong>
                
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="24px" height="24px"><path fill="#ff9800" d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z"/><path fill="#d50000" d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z"/><path fill="#ff3d00" d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z"/></svg>
                
                <!--
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="24px" height="24px"><path fill="#1565C0" d="M45,35c0,2.209-1.791,4-4,4H7c-2.209,0-4-1.791-4-4V13c0-2.209,1.791-4,4-4h34c2.209,0,4,1.791,4,4V35z"/><path fill="#FFF" d="M15.186 19l-2.626 7.832c0 0-.667-3.313-.733-3.729-1.495-3.411-3.701-3.221-3.701-3.221L10.726 30v-.002h3.161L18.258 19H15.186zM17.689 30L20.56 30 22.296 19 19.389 19zM38.008 19h-3.021l-4.71 11h2.852l.588-1.571h3.596L37.619 30h2.613L38.008 19zM34.513 26.328l1.563-4.157.818 4.157H34.513zM26.369 22.206c0-.606.498-1.057 1.926-1.057.928 0 1.991.674 1.991.674l.466-2.309c0 0-1.358-.515-2.691-.515-3.019 0-4.576 1.444-4.576 3.272 0 3.306 3.979 2.853 3.979 4.551 0 .291-.231.964-1.888.964-1.662 0-2.759-.609-2.759-.609l-.495 2.216c0 0 1.063.606 3.117.606 2.059 0 4.915-1.54 4.915-3.752C30.354 23.586 26.369 23.394 26.369 22.206z"/><path fill="#FFC107" d="M12.212,24.945l-0.966-4.748c0,0-0.437-1.029-1.573-1.029c-1.136,0-4.44,0-4.44,0S10.894,20.84,12.212,24.945z"/></svg>
                -->

              </div>
            </div>
          </div>
          
          <ul class="purchase-props">
            {{-- <li class="flex-between">
              <span>Company</span>
              <strong>Apple</strong>
            </li>
            <li class="flex-between">
              <span>Order number</span>
              <strong>429252965</strong>
            </li> --}}
            <li class="flex-between" >
              <span style="font-size: 25px;color:black;" >Course name: <strong style="font-size: 20px;color:lightblue;" >{{$course->name}}</strong></span>
              
            </li>
            {{-- <li class="flex-between">
              <span>VAT</span>
              <strong>$100.00</strong>
            </li> --}}
          </ul>
        </div>
        <div class="separation-line"></div>
        <div class="total-section flex-between flex-vertical-center">
          <div class="flex-fill flex-vertical">
            <div class="total-label f-secondary-color">You have to Pay</div>
            <div>
              <strong  >{{$course->price}}DH</strong>
              <input type="hidden" name="amount" value="100">
              {{-- <small>.99 <span class="f-secondary-color">USD</span></small> --}}
            </div>
          </div>
          <i class="ai-coin size-lg"></i>
        </div>
      </div>
    </form>
</div>

</body>
<script>
    
/* COPY INPUT VALUES TO CARD MOCKUP */
const bounds = document.querySelectorAll('[data-bound]');

for(let i = 0; i < bounds.length; i++) {
  const targetId = bounds[i].getAttribute('data-bound');
  const defValue = bounds[i].getAttribute('data-def');
  const targetEl = document.getElementById(targetId);
  bounds[i].addEventListener('keyup', () => targetEl.innerText = bounds[i].value || defValue );
}


/* TOGGLE CVC DISPLAY MODE */
const cvc_toggler = document.getElementById('cvc_toggler');

cvc_toggler.addEventListener('click', () => {
  const target = cvc_toggler.getAttribute('data-target');
  const el = document.getElementById(target);
  el.setAttribute('type', el.type === 'text' ? 'password' : 'text');
});


/* TIMER COUNTDOWN */
const timer = document.querySelector('[data-id=timer]');
let timeLeft = 5 * 60 + 1;

const tick = () => {
  if (timeLeft > 0) {
    timeLeft--;
    const date = new Date('2000-01-01 00:00:00');
    date.setSeconds(timeLeft);
    const str = date.toISOString();
    timer.children[0].innerText = str[14];
    timer.children[1].innerText = str[15];
    timer.children[3].innerText = str[17];
    timer.children[4].innerText = str[18];
  }
}

setInterval(() => { tick(); }, 1000);
tick();

</script>

{{-- limite max of lenght --}}
<script>
  function limitInput(element) {
      // Get the value of the input
      let value = element.value;

      // Remove non-numeric characters
      value = value.replace(/\D/g, '');

      // If the value exceeds 4 digits, truncate it
      if (value.length > 4) {
          value = value.substring(0, 4);
      }

      // Update the input's value
      element.value = value;
  }

  document.getElementById('numberInput').addEventListener('input', function () {
      // Ensure the value is within the min and max range
      let value = parseInt(this.value, 10);
      if (value > 9999) {
          this.value = 9999;
      } else if (value < 0) {
          this.value = 0;
      }
  });
</script>
<script>
   function combineCardNumber() {
    // Retrieve the values from individual input fields
    var number1 = document.getElementsByName("number1")[0].value;
    var number2 = document.getElementsByName("number2")[0].value;
    var number3 = document.getElementsByName("number3")[0].value;
    var number4 = document.getElementsByName("number4")[0].value;
    
    // Concatenate the values into a single string
    var combinedNumber = number1 + number2 + number3 + number4;
    
    // Assign the concatenated value to the hidden input field
    document.getElementById("card_number").value = combinedNumber;
  }
</script>
</html>
