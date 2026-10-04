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
- `2-beaver-ec2-compute.yaml`: EC2 인스턴스 및 보안 그룹 스택 (초기 원본 상태)
- `docker-compose.yml`: 프로메테우스 및 그라파나 도커 구성 파일

## 🛠️ 트러블슈팅 및 인프라 개선 이력

### [2026-10-04] EC2 루트 볼륨(EBS) 용량 부족 이슈 해결
- **발생 문제**: 
  - Docker Compose 구동 시 `no space left on device` 에러 발생.
  - Amazon Linux 2023 AMI 기본 루트 볼륨 크기가 2GB로 생성되어 도커 이미지 풀(Pull) 중 디스크가 가득 참.
- **해결 조치**:
  1. **인프라 코드 수정**: `2-beaver-ec2-compute.yaml` 템플릿 내 `BlockDeviceMappings` 설정을 추가하여 루트 볼륨 크기를 **20GB (gp3)**로 상향 정의.
  2. **운영 환경 반영**: 
     - AWS 콘솔(EBS 볼륨)에서 기존 인스턴스 볼륨 크기 확장.
     - EC2 터미널에서 `growpart` 및 `xfs_growfs` 명령어를 통해 파일시스템 리사이징 적용.
     - `df -h` 명령어로 `/` 파티션 용량 정상 확장 확인 완료.
