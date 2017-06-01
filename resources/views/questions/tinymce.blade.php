{!! Html::script('js/parsley.min.js')!!}
<script src="//cloud.tinymce.com/stable/tinymce.min.js?apiKey=qszzz8afw2q5rpi4vroy2wc1e3fhfb3ccnj6m2bu4nce66f8"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: 'link codesample autoresize textcolor lists',
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
            toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | forecolor link codesample ',
            menubar: false

        });

        tinymce.get('tinyMCEForm').triggerSave();
    </script>
