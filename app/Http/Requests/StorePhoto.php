<?php

namespace David\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhoto extends FormRequest
{
  /**
  * Determine if the user is authorized to make this request.
  *
  * @return bool
  */
  public function authorize()
  {
    return true;
  }

  /**
  * Get the validation rules that apply to the request.
  *
  * @return array
  */
  public function rules()
  {
    return [
      'title' => 'required|max:150',
      'category' => 'required',
      'caption' => 'max:150',
      'url_friendly' => 'max:250',
      'meta_description' => 'max:250',
      //'file' => 'required|image|max:100000',
      'file.*' => 'required|mimes:pdf, jpeg, bmp, png, tiff',
    ];
  }
}
