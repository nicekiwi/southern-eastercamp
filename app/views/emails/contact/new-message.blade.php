<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<p><strong>{{ $sender_question }}</strong></p>

		<p>{{ $sender_message }}</p>

		<p>Reguards,</p>
		<p>{{ $sender_name }}<br><a href="mailto:{{ $sender_email }}">{{ $sender_email }}</a></p>
	</body>
</html>