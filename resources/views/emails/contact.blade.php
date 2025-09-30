<x-mail::message>
# নতুন কন্টাক্ট মেসেজ

আপনার ওয়েবসাইটের কন্টাক্ট ফর্ম থেকে নতুন মেসেজ এসেছে।

**নাম:** {{ $data['name'] }}
**ফোন:** {{ $data['phone'] }}

**বার্তা:**
{{ $data['message'] }}

---

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
