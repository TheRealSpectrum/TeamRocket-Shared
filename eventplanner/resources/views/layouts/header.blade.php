
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Personal Website - Code With Dary
        </title>
        <link 
            rel="stylesheet" 
            href="{{ URL::asset('css/styles.css') }}"
        />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;900&display=swap"
        />
        <link 
            rel="stylesheet" 
            href="//use.fontawesome.com/releases/v5.0.7/css/all.css"
        />
    </head>
    
    <body>
        <!-- Header -->
        <header>
            <!-- Navigation -->
            <nav class="top-menu-container">
                <div class="logo-header">
                    <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">
                        <img 
                        src="https://cdn.pixabay.com/photo/2017/02/18/19/20/logo-2078018_960_720.png" 
                        alt="Logo personal portfolio"
                        title="Logo personal portfolio"
                        />
                    </a>
                </div>

                <ul>
                    <li>
                        <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
                    </li>
                    <li>
                        <a href="/" class="{{ request()->is('/about') ? 'active' : '' }}">About</a>
                    </li>
                    <li>
                        <a href="">Portfolio</a>
                    </li>
                    <li>
                        <a href="">Contact</a>
                    </li>
                </ul>
            </nav>
        </header>