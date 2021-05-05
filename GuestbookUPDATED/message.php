<?php include_once 'header.php'; ?>

<link rel="icon" href=../img/spacebook-website-icons.png>
<section class="message-form">
    <h2>Leave a message</h2>
    <div class="message">
        <form action="includes/message.inc.php" method="post">
            <input type="text" name="messageform" placeholder="Your message here...">
            <button type="submit" name="submit">Post</button>
        </form>
    </div>
</section>

<?php include_once 'footer.php'; ?>