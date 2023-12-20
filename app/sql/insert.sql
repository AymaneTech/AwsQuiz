insert into question (questionText)
values ("Why is AWS more economical than traditional data centers for applications with varying compute
workloads?"),
       (" Which AWS service would simplify the migration of a database to AWS?"),
       ("Which AWS offering enables users to find, buy, and immediately start using software solutions in their
AWS environment?"),
       ("Which AWS networking service enables a company to create a virtual network within AWS?"),
       ("Which of the following is an AWS responsibility under the AWS shared responsibility model?"),
       ("Which component of the AWS global infrastructure does Amazon CloudFront use to ensure low-latency
delivery?"),
       ("How would a system administrator add an additional layer of login security to a user''s AWS
Management Console?"),
       ("Which service can identify the user that made the API call when an Amazon EC2 instance is
terminated?"),
       ("Which service would be used to send alerts based on Amazon CloudWatch alarms?"),
       (" Where can a user find information about prohibited actions on the AWS infrastructure?");


insert into answer (answerText, answerStatus, questionFK)
values ("Amazon EC2 costs are billed on a monthly basis", 0, 1),
       ("Users retain full administrative access to their Amazon EC2 instances.", 0, 1),
       ("Amazon EC2 instances can be launched on demand when needed.", 1, 1),
       ("Users can permanently run enough instances to handle peak workloads.", 0, 1);

insert into answer (answerText, answerStatus, questionFK)
values ("AWS Storage Gateway", 0, 2),
       ("AWS Database Migration Service (AWS DMS)", 1, 2),
       ("Amazon EC2", 0, 2),
       (" Amazon AppStream 2.0", 0, 2),
       ("AWS Config", 0, 3),
       ("AWS OpsWorks", 0, 3),
       ("AWS SDK", 0, 3),
       ("AWS Marketplace", 1, 3),

       ("AWS Config", 0, 4),
       ("Amazon Route 53", 0, 4),
       ("AWS Direct Connect", 0, 4),
       ("Amazon Virtual Private Cloud (Amazon VPC)", 1, 4),

       ("Configuring third-party applications", 0, 5),
       ("Maintaining physical hardware", 1, 5),
       ("Securing application access and data", 0, 5),
       ("Managing guest operating systems", 0, 5),

       ("AWS Regions", 0, 6),
       ("Edge locations", 1, 6),
       ("Availability Zones ", 0, 6),
       ("Virtual Private Cloud (VPC)", 0, 6),

       ("Use Amazon Cloud Directory ", 0, 7),
       ("Audit AWS Identity and Access Management (IAM) roles", 0, 7),
       ("Enable multi-factor authentication", 1, 7),
       ("Enable AWS CloudTrail", 0, 7),

       ("AWS Trusted Advisor", 0, 8),
       ("AWS CloudTrail", 1, 8),
       ("AWS X-Ray", 0, 8),
       ("AWS Identity and Access Management (AWS IAM)", 0, 8),

       ("Amazon Simple Notification Service (Amazon SNS)", 1, 9),
       ("AWS CloudTrail", 0, 9),
       ("AWS Trusted Advisor", 0, 9),
       ("Amazon Route 53", 1, 9),

       ("AWS Trusted Advisor", 0, 10),
       ("AWS Identity and Access Management (IAM)", 0, 10),
       ("AWS Billing Console", 0, 10),
       ("AWS Acceptable Use Policy", 0, 10);

update question set questionDesc = "– The ability to launch instances on demand when needed allows users to launch and terminate instances in
response to a varying workload. This is a more economical practice than purchasing enough on-premises servers
to handle the peak load." where questionID = 1;

update question set questionDesc = "AWS DMS helps users migrate databases to AWS quickly and securely. The source database remains
fully operational during the migration, minimizing downtime to applications that rely on the database. AWS DMS
can migrate data to and from most widely used commercial and open-source databases." where questionID = 2;

update question set questionDesc = "AWS Marketplace is a digital catalog with thousands of software listings from independent software
vendors that makes it easy to find, test, buy, and deploy software that runs on AWS." where questionID = 3;

update question set questionDesc = "Amazon VPC lets users provision a logically isolated section of the AWS Cloud where users can launch
AWS resources in a virtual network that they define" where questionID = 4;

update question set questionDesc = "Maintaining physical hardware is an AWS responsibility under the AWS shared responsibility model." where questionID = 5;

update question set questionDesc = "To deliver content to users with lower latency, Amazon CloudFront uses a global network of points of
presence (edge locations and regional edge caches) worldwide." where questionID = 6;

update question set questionDesc = "Multi-factor authentication (MFA) is a simple best practice that adds an extra layer of protection on top of a
username and password. With MFA enabled, when a user signs in to an AWS Management Console, they will be
prompted for their username and password (the first factor—what they know), as well as for an authentication
code from their MFA device (the second factor—what they have). Taken together, these multiple factors provide
increased security for AWS account settings and resources." where questionID = 7;

update question set questionDesc = "AWS CloudTrail helps users enable governance, compliance, and operational and risk auditing of their
AWS accounts. Actions taken by a user, role, or an AWS service are recorded as events in CloudTrail. Events
include actions taken in the AWS Management Console, AWS Command Line Interface (CLI), and AWS SDKs
and APIs." where questionID = 8;

update question set questionDesc = "Amazon SNS and Amazon CloudWatch are integrated so users can collect, view, and analyze metrics for
every active SNS. Once users have configured CloudWatch for Amazon SNS, they can gain better insight into the
performance of their Amazon SNS topics, push notifications, and SMS deliveries.
" where questionID = 9;

update question set questionDesc = "The AWS Acceptable Use Policy provides information regarding prohibited actions on the AWS
infrastructure. " where questionID = 10;




