SELECT dep.dept_name AS Departamento,
	   CONCAT(emp.first_name, " ", emp.last_name) AS Funcionário,
       DATEDIFF(IFNULL(depEmp.to_date, CURDATE()), depEmp.from_date) AS "Dias trabalhados"
FROM employees AS emp
LEFT JOIN dept_emp AS depEmp ON emp.emp_no = depEmp.emp_no
LEFT JOIN departments AS dep ON depEmp.dept_no = dep.dept_no
ORDER BY DATEDIFF(IFNULL(depEmp.to_date, CURDATE()), depEmp.from_date) DESC
LIMIT 10