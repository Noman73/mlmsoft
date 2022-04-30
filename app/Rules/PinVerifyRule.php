<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;
use App\Models\PinBuilder;
class PinVerifyRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $message;
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $exist=User::where('pin_no',$value)->count();
        $check=PinBuilder::where('pin',$value)->count();
        if($exist>0){
            $this->message="The Pin Number Already Used";
            return false;
        }elseif($check<=0){
            $this->message="The Pin Number is invalid";
            return false;
        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
