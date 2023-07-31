<?php

if (!function_exists('movefile')) {

    function movefile($request, $field)
    {
        $destinationPath = public_path('/avatar/');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath);
        }

        if ($request->hasfile($field)) {
            $logo_image = $request->file($field);
            $logoFileName = time() . '-' . $logo_image->getClientOriginalName();;
            $logo_image->move($destinationPath, $logoFileName);

        } else {
            $logoFileName = $request->input('prev_' . $field);
        }
        return $logoFileName;
    }
}
