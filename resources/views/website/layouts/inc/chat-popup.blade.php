<div id="chat-popup" class="chat-popup">
    <div class="popup-inner">
        <div class="close-chat"><i class="fa fa-times"></i></div>
        <div class="chat-form">
            <p>
                Please fill out the form below and we will get back to you as soon
                as possible.
            </p>
            <form id="ContactMailForm" class="contact-form-validated contact-page__form"
                action="{{ route('contact.mail.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Your Name" required />
                </div>
                <div class="form-group">
                    <input type="text" name="phone" placeholder="Your Phone" required />
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="Your Text" required></textarea>
                </div>
                <div class="form-group message-btn">
                    <button type="submit" class="thm-btn">
                        Submit Now
                        <span><i class="icon-right-arrow"></i></span>
                    </button>
                </div>
                <div class="result"></div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).on('submit', '#ContactMailForm', function(e){
    e.preventDefault();
    let form = $(this);

    $.ajax({
        url: form.attr('action'),
        method: "POST",
        data: form.serialize(),
        success: function(res){
            if(res.success){
                toastr.success(res.message); // ✅ toastr success
                form.trigger("reset");
            }
        },
        error: function(xhr){
            let errors = xhr.responseJSON?.errors;
            if(errors){
                $.each(errors, function(key, value){
                    toastr.error(value[0]); // ✅ toastr error
                });
            } else {
                toastr.error('Something went wrong!');
            }
        }
    });
});
</script>
@endpush
