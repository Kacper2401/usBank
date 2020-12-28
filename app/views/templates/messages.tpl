{foreach $msgs->getMessages() as $msg}
    <ul>
        <li>{$msg->text}</li>
    </ul>
{/foreach}