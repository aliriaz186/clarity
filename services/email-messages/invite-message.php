<?php

namespace services\email_messages;

class InviteMessage
{
    public function InviteMessage($approvalEmail)
    {
        $emailBody = '
            <body>
            <div style="margin-left: 50px;font-size: 25px;padding-top: 40px">Registration Request!</div>
            <div style="padding-left: 50px;font-size: 18px;padding-right: 50px"> <p>' . $approvalEmail . '</span> has registered the brand against your email please click on the below button to sign in.</p>
              <div style="padding-top: 30px;padding-bottom: 40px">
 <a href="' . env('APP_URL') . '/brand/login/" style=" background-color: #1AAA55;
  border: none;
  color: white;
  padding: 10px 27px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 3px">Login</a>
  </div>
            </body>';
        return $emailBody;
    }

}
