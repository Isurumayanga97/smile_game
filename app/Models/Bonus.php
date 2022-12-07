<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\RedirectResponse;

class Bonus extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var string
     */
    protected $table = "bonuses";

    /**
     * @var string[]
     */
    protected $fillable = [
        'fk_bonus_userId',
        'no_of_bonus',
        'status'
    ];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param $id
     * @return RedirectResponse|int
     */
    public function storeBonus($id)
    {
        try {
            $bonusResponse = Bonus::where('fk_bonus_userId', '=', $id)->first();
            $addedValue = 1;

            if (is_null($bonusResponse)) {
                $no_of_bonus = 0;
            } else {
                $no_of_bonus = $bonusResponse->no_of_bonus;
            }

            Bonus::updateOrInsert(['fk_bonus_userId' => $id], ['no_of_bonus' => $no_of_bonus + $addedValue,
                'status' => 'PENDING']);
            return $bonusResponse->no_of_bonus + 1;
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return bool|RedirectResponse
     */
    public function claimUserBonus($id)
    {
        try {
            $bonusResponse = Bonus::where('fk_bonus_userId', '=', $id)->first();

            if ($bonusResponse->no_of_bonus == 0) {
                return false;
            } else {
                Bonus::updateOrInsert(['fk_bonus_userId' => $id], ['no_of_bonus' => $bonusResponse->no_of_bonus - 1,
                    'status' => 'CLAIMED']);
                return true;
            }
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

}
