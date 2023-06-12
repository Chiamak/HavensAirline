            <div class="content">
                <h2>WELCOME TO HAVENS AIRLINE!</h2>
                <img src="./images/bg5.jpg" width="90%" height="40%" alt="image1">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
        
        <footer>
            Copyright Flight Booking Group 1
        </footer>
    </div>
    <script>
        function showCode() {
            let code = 'HAV156FB';
            document.getElementById('code').value = code;
        }
        function seeAmount(){
            const selet = document.getElementById('fclass');
            const rad = document.querySelector('input[type = radio]:checked')
            const checked = rad.value;
            const output = selet.value;
            let amount;
            if(output === 'First Class' && checked === 'Dom-flight'){
                amount = '1000';
            }else if(output === 'First Class' && checked === 'Tnt-flight'){
                amount = '1700';
            }else if(output === 'Business Class' && checked === 'Dom-flight'){
                amount = '700';
            }else if(output === 'Business Class' && checked === 'Int-flight'){
                amount = '1450'
            }else{
                amount = '800'
            }
            document.querySelector('#amt').value = amount;
        }
    </script>
</body>

</html>