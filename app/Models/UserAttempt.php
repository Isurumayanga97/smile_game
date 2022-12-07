<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAttempt extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var string
     */
    protected $table = "user_attempts";

    /**
     * @var string[]
     */
    protected $fillable = [
        'fk_attempt_userId',
        'fk_attempt_gameId',
        'attempt',
        'check_attempt'
    ];


    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param $data
     * @return int|mixed
     */
    public function checkUserAttempt($data)
    {
        $attemptResponse = UserAttempt::where('fk_attempt_userId', '=', $data['userId'])
            ->where('fk_attempt_gameId', '=', $data['gameId'])
            ->get();

        if (count($attemptResponse) == 0) {
            return 1;
        } else {
                return $attemptResponse[0]['attempt'] + 1;
        }
    }

}
