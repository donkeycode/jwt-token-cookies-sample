import { TestBed } from '@angular/core/testing';

import { AuthentService } from './authent.service';

describe('AuthentService', () => {
  let service: AuthentService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(AuthentService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
