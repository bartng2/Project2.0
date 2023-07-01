<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class data extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'Mã Nhân viên' => $this->MaNv,
            'Họ tên' => $this->HoTen,
            'Ngày sinh' => $this->NgaySinh,
            'Giới Tính' => $this->GioiTinh,
            'Chức vụ' => $this->ChucVu,
            'Ảnh' => $this->Avatar,
            'Thời gian tạo' => $this->created_at->format('d/m/Y'),
            'Thời gian chỉnh sửa' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
