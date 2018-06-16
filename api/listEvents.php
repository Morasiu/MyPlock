<?php
require_once('config/config.php');

	$stmt = $db->query(
		"SELECT
			name,
			description,
			fromDate,
			toDate,
			place,
			numberOfReports,
			categoryName
		FROM
			events
		INNER JOIN
			categories
				ON events.idCategory = categories.idCategory
		WHERE
			toDate >= CURDATE()
		ORDER BY fromDate ASC"
	);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($result);
 ?>
