<!-- 
This will be a navigation bar that displays different links based on whether or not the user is logged in. 
If a user is not logged in, display links to login.php and for final project proposal (HW 10). 
Otherwise, display links to store.php, cart.php, logout.php, and your final project proposal (HW 10).
 -->

    <nav class = "navbar navbar-expand-lg navbar-dark bg-primary">
        
        <a class="navbar-brand" href="#">
            <svg class="bi bi-gem" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3.1.7a.5.5 0 01.4-.2h9a.5.5 0 01.4.2l2.976 3.974c.149.185.156.45.01.644L8.4 15.3a.5.5 0 01-.8 0L.1 5.3a.5.5 0 010-.6l3-4zm11.386 3.785l-1.806-2.41-.776 2.413 2.582-.003zm-3.633.004l.961-2.989H4.186l.963 2.995 5.704-.006zM5.47 5.495l5.062-.005L8 13.366 5.47 5.495zm-1.371-.999l-.78-2.422-1.818 2.425 2.598-.003zM1.499 5.5l2.92-.003 2.193 6.82L1.5 5.5zm7.889 6.817l2.194-6.828 2.929-.003-5.123 6.831z" clip-rule="evenodd"/>
            </svg>
            <?= USERSTORE ?>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class ="navbar-nav">
                <?php if( !isset($_SESSION['username']) && !isset($_SESSION['loggedin'])): ?>
                    <li class = "nav-item">
                        <a class = "nav-link" href = "home.php"> Home </a>
                    </li>
                    <li class = "nav-item">
                        <a class = "nav-link" href = "#"> Final Project Proposal </a>
                    </li>
                    <li class = "nav-item">
                        <a class = "nav-link" href = "login.php"> Login </a>
                    </li>
                <?php else: ?>
                    <li class = "nav-item">
                        <a class = "nav-link" href = "home.php"> Home </a>
                    </li>
                    <li class = "nav-item"> 
                        <a class = "nav-link" href = "store.php"> Web Store </a>
                    </li>
                    <li class = "nav-item">
                        <a class = "nav-link" href = "logout.php"> Log Out </a>
                    </li>
                    <li class = "nav-item">
                        <a class = "nav-link" href = "cart.php"> Cart </a>
                    </li>
                    <li class = "nav-item">
                        <a class = "nav-link" href = "#"> Final Project Proposal </a>
                    </li>
                <?php endif; ?>    
            </ul>
        </div>
    </nav>

