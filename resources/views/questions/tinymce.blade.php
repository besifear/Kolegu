{!! Html::script('js/parsley.min.js')!!}
<script src="/js/tinymce/tinymce.min.js"></script>
    {{-- <script>
        tinymce.init({
            selector:'textarea',
            file_browser_callback: function(field_name, url, type, win) {
                win.document.getElementById(field_name).value = 'my browser value';
            },
            plugins: 'link codesample autoresize textcolor lists image code',
            codesample_languages: [
                {text: 'HTML/XML', value: 'markup'},
                {text: 'JavaScript', value: 'javascript'},
                {text: 'CSS', value: 'css'},
                {text: 'PHP', value: 'php'},
                {text: 'Ruby', value: 'ruby'},
                {text: 'Python', value: 'python'},
                {text: 'Java', value: 'java'},
                {text: 'C', value: 'c'},
                {text: 'C#', value: 'csharp'},
                {text: 'C++', value: 'cpp'}
            ],
            toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | forecolor link codesample image code',
            menubar: false

        });

        tinymce.get('tinyMCEForm').triggerSave();
    </script> --}}

    <script>
        
  tinymce.init({



    selector: "#content",
    theme: "modern",
    paste_data_images: true,
    plugins: [
      'link codesample autoresize textcolor lists image code',
    ],
    menubar: false,
    toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | forecolor link codesample image code',
    image_advtab: false,
    file_picker_callback: function(callback, value, meta) {
      if (meta.filetype == 'image') {
        $('#upload').trigger('click');
        $('#upload').on('change', function() {
          var file = this.files[0];
          var reader = new FileReader();
          reader.onload = function(e) {
            callback(e.target.result, {
              alt: ''
            });
          };
          reader.readAsDataURL(file);
        });
      }
    },
    templates: [{
      title: 'Test template 1',
      content: 'Test 1'
    }, {
      title: 'Test template 2',
      content: 'Test 2'
    }]
  });
    </script>