import { TestBed, inject } from '@angular/core/testing';

import { BpuserSetGetService } from './bpuser-set-get.service';

describe('BpuserSetGetService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [BpuserSetGetService]
    });
  });

  it('should be created', inject([BpuserSetGetService], (service: BpuserSetGetService) => {
    expect(service).toBeTruthy();
  }));
});
