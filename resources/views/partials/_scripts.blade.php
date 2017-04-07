<script>
window.Laravel = <?php echo json_encode([
	'csrfToken' => csrf_token(),
	]); ?>
</script>

<script src="/js/app.js"></script>

{{-- <script src="/js/vue.min.js"></script> --}}
{{-- <script src="/js/search.js"></script> --}}
{{-- <script src="https://unpkg.com/vue@2.2.6"></script> --}}
