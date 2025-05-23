<?php
$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);
?>

<main style="padding: 2rem; max-width: 1000px; margin: auto;">
    <h2>Current Job Openings</h2>
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div style="border: 1px solid #ccc; padding: 1rem; margin-bottom: 1.5rem; border-radius: 8px;">
                <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                <?php if (!empty($row['image'])): ?>
                    <img src="images/<?php echo htmlspecialchars($row['image']); ?>" alt="Job Image" style="width: 100%; max-height: 300px; object-fit: cover; border-radius: 5px;">
                <?php endif; ?>
                <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                <p><strong>Responsibilities:</strong> <?php echo nl2br(htmlspecialchars($row['responsibilities'])); ?></p>
                <p><strong>Skills:</strong> <?php echo nl2br(htmlspecialchars($row['skills'])); ?></p>
                <p><strong>Education and Experience:</strong> <?php echo nl2br(htmlspecialchars($row['education and experience'])); ?></p>
                <p><strong>Salary Range:</strong> <?php echo htmlspecialchars($row['salary_range']); ?></p>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No job openings available at the moment.</p>
    <?php endif; ?>
</main>
<?php
$conn->close();
include 'includes/footer.php';
?>