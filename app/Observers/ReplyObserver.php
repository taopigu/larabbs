<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\TopicReplied;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver{

    public function created(Reply $reply){
        $reply->topic->updateReplyCount();

        //通知话题作者有新评论
        $reply->topic->user->notify(new TopicReplied($reply));
    }

    public function creating(Reply $reply){
        $reply->body = clean($reply->body, 'user_topic_body');
    }

    public function deleted(Reply $reply)
    {
        $reply->topic->updateReplyCount();
    }

}
