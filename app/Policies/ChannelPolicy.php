<?php

namespace App\Policies;

use App\Models\Channel;
use App\Models\User;

class ChannelPolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user, Channel $channel)
    {
        return $user->id == $channel->user_id;
    }
}
