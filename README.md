# 🦫 Beaver Monitoring Infrastructure
AWS CloudFormation과 Docker를 활용하여 구축한 **Prometheus & Grafana 기반 인프라 모니터링 자동화 프로젝트**입니다.

## 🛠 Tech Stack
- **Cloud Infrastructure:** AWS EC2, VPC, CloudFormation (Nested Stacks)
- **OS:** Amazon Linux 2023
- **Container & Monitoring:** Docker, Prometheus, Grafana, Nginx
- **Version Control:** Git / GitHub

## 📂 Directory Structure
- `beaver-main-root.yaml`: 메인 루트 CloudFormation 스택
- `1-beaver-vpc-network.yaml`: VPC 및 네트워크 인프라 스택
- `2-beaver-ec2-compute.yaml`: EC2 인스턴스 및 보안 그룹 스택 (루트 볼륨 20GB 증설 포함)
- `docker-compose.yml`: 프로메테우스 및 그라파나 도커 구성 파일

## 🚀 Troubleshooting History
- **Issue:** 최소형 미니멀 AMI 사용 시 기본 루트 볼륨이 2GB로 생성되어 도커 이미지 빌드 시 `no space left on device` 에러 발생
- **Resolution:** CloudFormation 템플릿(`2-beaver-ec2-compute.yaml`)에 `BlockDeviceMappings`를 추가하여 루트 볼륨을 20GB로 확장
