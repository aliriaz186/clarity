<?php

namespace services\email_messages;

class BrandMessage
{
    public function brandMessage($message)
    {
        $emailBody = '
            <body>
            <div style="margin-left: 50px;font-size: 25px;padding-top: 40px">Message!</div>
            <div style="padding-left: 50px;font-size: 18px;padding-right: 50px"> <p>' . $message . '</span></p>
              <div style="padding-top: 30px;padding-bottom: 40px">
  </div>
            </body>';
        return $emailBody;
    }

}
